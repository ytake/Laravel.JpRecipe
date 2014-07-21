<?php
namespace App\Authenticate;

/**
 * Interface AuthenticateInterface
 * @package App\Authenticate
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
interface AuthenticateInterface
{

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param $code
     * @return mixed
     */
    public function getToken($code);

    /**
     * @param $accessToken
     * @return mixed
     */
    public function getUser($accessToken);
} 