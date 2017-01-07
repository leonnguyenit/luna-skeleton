<?php

defined('LUNA_SYSTEM') OR die('Hacking attempt!');

return [
    'settings' => [
        // App Global Settings
        'global' => [
            'charset' => 'UTF-8',
            'site_name' => "LunaSYS",
            'site_theme' => 'default',
            'admin_theme' => 'admin_default',
            // Cookie
            'cookie_prefix' => 'lunacookie',
            'cookie_domain' => '',
            'cookie_path' => '/',
            'cookie_secure' => FALSE,
            'cookie_httponly' => FALSE,
            // Session Options            
            'sess_prefix' => 'lunasess',
            'sess_name' => 'LunaSYS',
            'sess_lifetime' => 7200,
            'sess_path' => null,
            'sess_domain' => null,
            'sess_secure' => false,
            'sess_httponly' => true,
            'sess_cache_limiter' => 'nocache'
        ],
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        // View settings
        'view' => [
            'template_path' => LUNA_THEMEPATH,
            'twig' => [
                'cache' => LUNA_BASEPATH . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        // Illuminate database settings
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'lunadb',
            'username' => 'luna',
            'password' => 'luna',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => 'ln1_',
        ]
    ],
];
