<?php

namespace Luna\Breadcrumbs;

use Interop\Container\ContainerInterface;

/**
 * Breadcrumbs
 *
 * @author leonnguyen
 */
class Breadcrumbs {
    
    /**
     * App Container
     * @var ContainerInterface
     */
    protected $ci;
    
    /**
     * Breadcrumbs Data
     * @var array
     */
    public $breadcrumbs;
    
    /**
     * Base url
     * @var String
     */
    public $base_url;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
        $this->base_url = $this->ci->get('request')->getUri()->getBaseUrl();
        $this->breadcrumbs = [];
    }

    public function push($title = '', $href = '') {
        if (!isset($title)) {
            return;
        }

        $url = isset($href) ? base_url($href) : base_url();
        $this->breadcrumbs[$href] = array('title' => $title, 'url' => $url);
    }

    public function unshift($title = '', $href = '') {
        if (!$title OR ! $href) {
            return;
        }
        $url = isset($href) ? base_url($href) : base_url();
        $this->breadcrumbs = array_merge(array($href => array('title' => $title, 'url' => $url)), $this->breadcrumbs);
    }

    public function get_data() {
        return $this->breadcrumbs;
    }

    public function render() {

        $content = '';
        if (!empty($this->breadcrumbs)) {
            $content = '<div class="container"><ol class="breadcrumb breadcrumb-post">';
            foreach ($this->breadcrumbs as $key => $item) {
                $keys = array_keys($this->breadcrumbs);
                if (end($keys) === $key) {
                    $content .= '<li class="active" >' . title_case($item['title']) . '</li>';
                } else {
                    $content .= '<li><a href="' . $item['url'] . '" >' . title_case($item['title']) . '</a></li>';
                }
            }
            $content .= '</ol></div>';
        }

        return $content;
    }

}
