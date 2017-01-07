<?php

namespace Luna\Controllers\Admin;

use Luna\Core\AdminController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Dashboard Admin Controller
 *
 * @author leonnguyen
 */
class Dashboard extends AdminController{
    
    /**
     * Default controller invoke
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public function __invoke($request, $response, $args) {
        return $this->view->render($response, '@' . $this->theme_name . '/index.twig', $this->data );
    }

}
