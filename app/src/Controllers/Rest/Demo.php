<?php

namespace Luna\Controllers\Rest;

use Luna\Core\RestController;

/**
 * Demo Rest Controller
 *
 * @author leonnguyen
 */
class Demo extends RestController{
    
    // Default Controller invoke
    public function __invoke($request, $response, $args) {
        
    }

    public function create($request, $response, $args) {
        
    }

    public function delete($request, $response, $args) {
        
    }

    public function get($request, $response, $args) {
        $this->messages = 'Hello World from a API REST Controller';
        $this->status = 200;
        $this->data = [
            'message'  => $this->messages,
            'status' => $this->status
        ];
        
        return $response->withJson($this->data, $this->status);
        
    }

    public function update($request, $response, $args) {
        
    }

}
