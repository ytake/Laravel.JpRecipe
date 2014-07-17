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
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getUrl()
    {
        return $this->client->get($this->authorize, [
                'query' => [
                    'client_id' => \Config::get('github.client_id')
                ]
            ]);
    }
} 