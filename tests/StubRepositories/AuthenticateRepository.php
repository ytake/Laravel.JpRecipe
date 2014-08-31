<?php
namespace App\Tests\StubRepositories;

use App\Authenticate\AuthenticateInterface;
use App\Exception\OAuthErrorException;

class AuthenticateRepository implements AuthenticateInterface
{

    /** @var string  */
    protected $authorize = "https://github.com/login/oauth/authorize";

    /**
     * ログインURL取得
     * @return string
     */
    public function getUrl()
    {
        $param = [
            'scope' => 'user',
            'client_id' => 'testing',
            'redirect_uri' => 'http://example.com'
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
        if($code == 'testing') {
            throw new OAuthErrorException('testing exception');
        }
        return ['access_token' => 123456789];
    }

    /**
     * @param $accessToken
     * @return mixed
     */
    public function getUser($accessToken)
    {
        return ['login' => 'testing', 'id' => 123456789];
    }
}