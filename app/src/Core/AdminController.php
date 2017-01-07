<?php

namespace Luna\Core;

use Interop\Container\ContainerInterface;
use const LUNA_THEMEPATH;

/**
 * AdminController
 *
 * @author leonnguyen
 */
abstract class AdminController extends BaseController {

    /**
     * Theme name
     * @var String
     */
    public $theme_name;

    /**
     * Module name
     * @var String
     */
    public $module_name;
    
    /**
     * Module title
     * @var String
     */
    public $module_title;
    
    /**
     * Module info
     * @var array
     */
    public $module_info;
    
    /**
     * AdminController constructor
     * @param ContainerInterface $ci
     */
    public function __construct(ContainerInterface $ci) {
        parent::__construct($ci);
        $this->theme_name = isset($this->config['sys']['admin_theme']) ? $this->config['sys']['admin_theme'] : 'admin_default';
        $this->view->getLoader()->setPaths(LUNA_THEMEPATH . '/' . $this->theme_name . '/', $this->theme_name);
        
        $this->data['theme_name'] = $this->theme_name;
        $this->data['site'] = isset($this->config['site']) ? $this->config['site'] : [];
        isset($this->data['site']['site_name']) OR $this->data['site']['site_name'] = $this->config['sys']['site_name'];
        $this->data['theme_path'] = '/themes/' . $this->theme_name;
    }

}
