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
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getUrl();
} 