<?php
namespace App\Extend\Module;

use Nocarrier\Hal;

/**
 * Hypertext Application Language返却の実装
 * Class HalRender
 * @package App\Extend\Module
 * @author  yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 */
class HalRender
{

    /** @var \Nocarrier\Hal */
    protected $hal;

    /** @var array */
    protected $headers = [
        'Content-Type' => 'application/hal+json'
    ];

    /**
     * @param Hal $hal
     */
    public function __construct(Hal $hal)
    {
        $this->hal = $hal;
    }

    /**
     * @param $data
     * @param int $status
     * @param $header
     * @return \Illuminate\Http\Response
     */
    public function render(Hal $data, $status = 200, $header)
    {
        $header = array_merge($this->headers, $header);
        return \Response::make($data->asJson(), $status, $header);
    }
} 