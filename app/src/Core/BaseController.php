<?php

namespace Luna\Core;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * BaseController
 *
 * @author leonnguyen
 */
abstract class BaseController {
    
    /**
     * App container
     * @var ContainerInterface
     */
    protected $ci;
    
    /**
     * Luna Twig View
     * @var LunaView
     */
    protected $view;
    
    /**
     * Illuminate Database
     * @var object
     */
    protected $db;
    
    /**
     * Illuminate Schema Database
     * @var object
     */
    protected $schema;
    
    /**
     * Module Config
     * @var array
     */
    protected $config;
    
    /**
     * Passing Data
     * @var array
     */
    public $data;
    
    /**
     * Messages
     * @var mixed
     */
    public $messages;
    
    /**
     * Errors
     * @var mixed
     */
    public $errors;
    
    /**
     * BaseController Class Constructor
     * @param ContainerInterface $ci
     */
    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
        $this->view = $this->ci->get('view');
        $this->db = $this->ci->get('db');
        $this->schema = $this->db->getSchemaBuilder();
        $this->config = $this->ci->get('config');
    }
    
    /**
     * Abstract Default Controller Action
     * 
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    abstract function __invoke($request, $response, $args);
}
