<?php

defined('LUNA_SYSTEM') OR die('Hacking attempt!');

if (!function_exists('base_url')) {

    function base_url($uri = NULL, $suffix = FALSE) {
        global $container;
        $base_url = $container->get('request')->getUri()->getBaseUrl();

        if (isset($uri) && $uri !== '/') {
            if (strpos($uri, '/') !== 0) {
                $uri = '/' . $uri;
            }
            if ($suffix) {
                return $base_url . $uri . '.html';
            } else {
                return $base_url . $uri;
            }
        }

        return $base_url;
    }

}