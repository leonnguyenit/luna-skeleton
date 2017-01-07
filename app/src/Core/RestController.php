<?php

namespace Luna\Core;

use Interop\Container\ContainerInterface;

/**
 * RestController
 * 
 * REST API base controller
 * 
 * @author leonnguyen
 */
abstract class RestController extends BaseController {
    
    /**
     * REST Controller Constructor
     * @param ContainerInterface $ci
     */
    public function __construct(ContainerInterface $ci) {
        parent::__construct($ci);
    }

    /**
     * Get data (all or single)
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return string JSON
     */
    abstract function get($request, $response, $args);

    /**
     * Create new data
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return string JSON
     */
    abstract function create($request, $response, $args);

    /**
     * Update data
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return string JSON
     */
    abstract function update($request, $response, $args);

    /**
     * Delete data
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return string JSON
     */
    abstract function delete($request, $response, $args);
}
