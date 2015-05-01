<?php

namespace bootbuilder;

class Page {
    
    private $title;
    private $css;
    private $js;
    private $html5;
    private $meta;
    
    private $bootstrap_path;
    
    private $bootstrap_css;
    private $bootstrap_js;
    
    public function __construct($html5 = true, $title = "", $css = [], $js = [], $meta = []) {
        $this->html5 = $html5;
        $this->title = $title;
        $this->css = $css;
        $this->js = $js;
        $this->meta = $meta;
        
        $this->bootstrap_css = "//maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css";
        $this->bootstrap_js = "//maxcdn.bootstrapcdn.com/bootstrap/latest/js/bootstrap.min.js";
    }
    
    /**
     * Set path to the folder that contains subfolders with js, css and fonts in it.
     * 
     * If you want to use the CDN (default) don't use this function
     * Warning, CDN uses most recent version.
     * 
     * @param string $path
     */
    public function setBootstrapPath($path) {
        $this->bootstrap_path = $path;
    }
    
    
}