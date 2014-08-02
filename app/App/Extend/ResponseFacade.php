<?php
namespace App\Extend;

use Illuminate\Support\Facades\Response;

/**
 * Class ResponseFacade
 * @package App\Extend
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class ResponseFacade extends Response
{

    /**
     * hypermedia format
     * \Response::Hateoas
     * @param $data
     * @param int $status
     * @param array $header
     */
    public static function Hateoas($data, $status = 200, array $header = [])
    {

    }
} 