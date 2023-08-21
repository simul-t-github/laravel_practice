<?php


if (!function_exists('p')) {
    function p($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}


if (!function_exists('d_format')) {
    function d_format($format, $date)
    {
        return date($format, strtotime($date));
    }
}
