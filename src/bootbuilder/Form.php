<?php

namespace bootbuilder;

abstract class Form {
    protected $controls;
    
    public function __construct() {
        $this->controls = array();
    }
    
    /**
     * Render a form Control
     * @param Control
     */
    public static function renderControl($control);
    
    /**
     * Close the form
     */
    public function close(boolean $render = true);
    
    /**
     * Add control to form
     */
    public function add(Controls\Control $control) {
        array_push($this->controls, $control);
    }
    
}