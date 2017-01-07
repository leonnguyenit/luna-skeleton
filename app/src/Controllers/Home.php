<?php

namespace Luna\Controllers;

use Luna\Core\SiteController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Home Controller
 *
 * @author leonnguyen
 */
class Home extends SiteController {

    /**
     * Default Controller Action
     * 
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public function __invoke($request, $response, $args) {
        return $this->view->render($response, '@' . $this->theme_name . '/index.twig', $this->data );
    }

}
