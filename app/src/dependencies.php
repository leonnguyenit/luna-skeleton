<?php

defined('LUNA_SYSTEM') OR die('Hacking attempt!');

// Illuminate Database Service
$container['db'] = function($c) {
    $settings = $c->get('settings');
    $container = new Illuminate\Container\Container;
    $connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
    $conn = $connFactory->make($settings['db']);
    $resolver = new \Illuminate\Database\ConnectionResolver();
    $resolver->addConnection('default', $conn);
    $resolver->setDefaultConnection('default');
    \Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);

    return $conn;
};

// Config service
$container['config'] = function($c) {
    $settings = $c->get('settings');
    $db = $c->get('db');
    $schema = $db->getSchemaBuilder();

    $config['sys'] = $settings['global'];

    if ($schema->hasTable('configs')) {
        $all_configs = $db->table('configs')->get();
        foreach ($all_configs as $item) {
            $config[$item->module][$item->config_name] = $item->config_value;
        }
    }

    return $config;
};

// Session service
$container['session'] = function($c) {
    return new Luna\Session\Session($c);
};

// View service
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Luna\Views\LunaTwig($settings['view']['template_path'], $settings['view']['twig']);
    $view->addExtension(new Luna\Views\LunaTwigExtension($c));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};

/**
 * Breadcrumbs Services
 */
$container['breadcrumbs'] = function($c) {
    return new Luna\Breadcrumbs\Breadcrumbs($c);
};

