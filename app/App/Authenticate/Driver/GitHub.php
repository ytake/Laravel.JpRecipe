<?php
namespace App\Authenticate\Driver;

use GuzzleHttp\ClientInterface;
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
     * @param $code
     * @return mixed
     */
    public function getToken($code)
    {

        return $this->client->post($this->accessToken, [
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
    }
} 