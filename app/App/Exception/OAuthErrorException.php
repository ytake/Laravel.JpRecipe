<?php
namespace App\Exception;

/**
 * Class OAuthErrorException
 * @package App\Exception
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class OAuthErrorException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code = 400)
    {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
} 