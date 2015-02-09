<?php

if(!function_exists('datetime_format')) {

    /**
     * @param $string
     * @param $format
     * @return string
     */
    function datetime_format($string, $format)
    {
        if ($string === "" || $string == null) {
            return "";
        }
        return strftime($format, strtotime($string));
    }
}
