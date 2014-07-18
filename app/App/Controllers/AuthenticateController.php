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
     * @return void
     */
    public function getLogin()
    {
        $data = [
            'login_url' => $this->auth->getUrl()
        ];
        $this->view('auth.login', $data);
    }

    /**
     *
     */
    public function getCallback()
    {
        $this->auth->getToken(\Input::get('code'));
    }


    public function getLogout()
    {

    }
} 