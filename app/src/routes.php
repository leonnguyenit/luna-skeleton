<?php

defined('LUNA_SYSTEM') OR die('Hacking attempt!');

/**
 * REST API Routes
 */
$app->group('/api', function(){
    
    // Api version: v1
    $this->group('/v1', function(){
        
        // demo
        $this->get('/demo', 'Luna\Controllers\Rest\Demo:get');
        
    });
    
});

// -----------------------------------------------------------------------------

/**
 * Admin Routes
 */
$app->group('/admin', function(){
   
    // Dashboard
    $this->get('', 'Luna\Controllers\Admin\Dashboard');
    
});

// -----------------------------------------------------------------------------

/**
 * Front-Site routes
 */
$app->get('/', 'Luna\Controllers\Home');




