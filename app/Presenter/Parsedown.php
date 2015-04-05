<?php
namespace App\Presenter;

class Parsedown extends \Parsedown
{

    /**
     * @param $Excerpt
     * @return array|void
     */
    protected function inlineImage($Excerpt)
    {
        if (!isset($Excerpt['text'][1]) or $Excerpt['text'][1] !== '[') {
            return null;
        }
        $Excerpt['text'] = substr($Excerpt['text'], 1);
        $Link = $this->inlineLink($Excerpt);
        if ($Link === null) {
            return null;
        }
        $Inline = array(
            'extent' => $Link['extent'] + 1,
            'element' => array(
                'name' => 'img',
                'attributes' => array(
                    'src' => $Link['element']['attributes']['href'],
                    'alt' => $Link['element']['text'],
                    'class' => 'responsive-img'
                ),
            ),
        );
        $Inline['element']['attributes'] += $Link['element']['attributes'];
        unset($Inline['element']['attributes']['href']);

        return $Inline;
    }

}