<?php
namespace App\Authenticate\Driver;

use GuzzleHttp\ClientInterface;
use App\Exception\OAuthErrorException;
use App\Authenticate\AuthenticateInterface;

/**
 * Class GitHub
 * @package App\Authenticate\Driver
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class GitHub implements AuthenticateInterface
{

    /** @var string  */
    protected $authorize = "https://github.com/login/oauth/authorize";

    /** @var string  */
    protected $accessToken = "https://github.com/login/oauth/access_token";

    /** @var string  */
    protected $baseUrl = "https://api.github.com";

    /** @var \GuzzleHttp\Client  */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * ログインURL取得
     * @return string
     */
    public function getUrl()
    {
        $param = [
            'scope' => 'user',
            'client_id' => \Config::get('github.client_id'),
            'redirect_uri' => action('auth.callback')
        ];
        return $this->authorize . "?" . http_build_query($param);
    }

    /**
     * get access token
     * @param $code
     * @return mixed
     * @throws \App\Exception\OAuthErrorException
     */
    public function getToken($code)
    {

        $result = $this->client->post($this->accessToken, [
                'headers' => [
                    "Content-Type" => "application/x-www-form-urlencodedrn",
                    "Accept" => "application/json"
                ],
                'body' => [
                    'client_id' => \Config::get('github.client_id'),
                    'client_secret' => \Config::get('github.client_secret'),
                    'code' => $code,
                    'redirect_uri' => action('auth.callback')
                ]
            ])->json();
        if(isset($result['error'])) {
            throw new OAuthErrorException($result['error_description']);
        }
        return $result;
    }

    /**
     * @param $accessToken
     * @return mixed
     */
    public function getUser($accessToken)
    {
        return $this->client->get("{$this->baseUrl}/user", [
            'query' => [
                'access_token' => $accessToken
            ],
        ])->json();
    }
}