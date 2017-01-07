<?php

define('LUNA_SYSTEM', TRUE);
define('LUNA_VERSION', '0.1');
define('LUNA_BASEPATH', dirname(__FILE__));
define('LUNA_APPPATH', LUNA_BASEPATH . '/../app');
define('LUNA_THEMEPATH', LUNA_BASEPATH . '/themes');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vendor Autoload
require( LUNA_BASEPATH . '/../vendor/autoload.php' );

// App settings and initilize
$app_settings = require( LUNA_APPPATH . '/settings.php' );
$app = new Slim\App($app_settings);
$container = $app->getContainer();

// App depenedencies
require( LUNA_APPPATH . '/src/dependencies.php' );

// App middleware
require( LUNA_APPPATH . '/src/middleware.php' );

// App routes
require( LUNA_APPPATH . '/src/routes.php' );

// App run
$app->run();