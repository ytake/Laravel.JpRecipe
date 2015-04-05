<?php
namespace App\Extend;

use Nocarrier\Hal;
use App\Extend\Module\HalRender;
use Illuminate\Support\Facades\Response AS BaseResponse;

/**
 * Class ResponseFacade
 * @package App\Extend
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class Response extends BaseResponse
{

    /**
     * Hypertext Application Language format
     * usage \Response::hal
     * @param Hal $data
     * @param int $status
     * @param array $header
     * @return \Illuminate\Http\Response
     */
    public static function hal(Hal $data, $status = 200, array $header = [])
    {
        $hal = new HalRender($data);
        return $hal->render($data, $status, $header);
    }
}
