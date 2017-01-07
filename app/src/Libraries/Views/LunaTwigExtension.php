<?php

namespace Luna\Views;

use Slim\Http\Uri;
use Slim\Interfaces\RouterInterface;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * LunaTwigExtension
 *
 * @author leonnguyen
 */
class LunaTwigExtension extends Twig_Extension {

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var string|Uri
     */
    private $uri;
    private $ci;
    private $sys_config;

    public function __construct($ci) {
        $this->ci = $ci;
        $this->router = $this->ci->get('router');
        $this->uri = $this->ci->get('request')->getUri();
        $this->sys_config = $this->ci->get('config')['sys'];
    }

    public function getName() {
        return 'slim';
    }

    public function getFunctions() {
        return [
            new Twig_SimpleFunction('path_for', array($this, 'pathFor')),
            new Twig_SimpleFunction('base_url', array($this, 'baseUrl')),
            new Twig_SimpleFunction('site_url', array($this, 'siteUrl')),
            new Twig_SimpleFunction('asset_url', array($this, 'assetUrl')),
            new Twig_SimpleFunction('site_title', array($this, 'siteTitle'))
        ];
    }

    public function pathFor($name, $data = [], $queryParams = [], $appName = 'default') {
        return $this->router->pathFor($name, $data, $queryParams);
    }

    public function baseUrl() {
        if (is_string($this->uri)) {
            return $this->uri;
        }
        if (method_exists($this->uri, 'getBaseUrl')) {
            return $this->uri->getBaseUrl();
        }
    }

    public function siteUrl($uri = NULL, $suffix = FALSE) {
        if (isset($uri) && $uri !== '/') {
            return ($suffix) ? $this->uri->getBaseUrl() . $uri . '.html' : $this->uri->getBaseUrl() . $uri . '/';
        }
        return $this->uri->getBaseUrl();
    }

    public function siteTitle($title = NULL, $seperator = '&raquo;', $direction = 'left') {
        $site_name = isset($this->sys_config['site_name']) ? $this->sys_config['site_name'] : 'SlimFramework';
        if (isset($title)) {
            if ($direction == 'left') {
                return $title . ' ' . $seperator . ' ' . $site_name;
            }
            return $site_name . ' ' . $seperator . ' ' . $title;
        }
        return $site_name;
    }

    public function assetUrl($resource_uri = NULL) {
        if (isset($resource_uri) && $resource_uri !== '/') {
            if (strpos($resource_uri, '/') === 0) {
                return $this->uri->getBaseUrl() . $resource_uri;
            }
            return $this->uri->getBaseUrl() . '/' . $resource_uri;
        }
        return '';
    }

    /**
     * Set the base url
     *
     * @param string|Uri $baseUrl
     * @return void
     */
    public function setBaseUrl($baseUrl) {
        $this->uri = $baseUrl;
    }

}
