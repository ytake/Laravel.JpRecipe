<?php
namespace App\Controllers;

use App\Authenticate\AuthenticateInterface;

/**
 * Class AuthenticateController
 * @package App\Controllers
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class AuthenticateController extends BaseController
{

    /** @var AuthenticateInterface  */
    protected $auth;

    /**
     * @param AuthenticateInterface $auth
     */
    public function __construct(AuthenticateInterface $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function getLogin()
    {
        return $this->auth->getUrl()->getBody();
    }

    public function getCallback()
    {

    }

    public function getLogout()
    {

    }
} 