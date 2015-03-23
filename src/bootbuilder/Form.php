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
    public abstract static function renderControl($control);
    
    /**
     * Close the form
     */
    public abstract function close($render = true);
    
    /**
     * Add control to form
     */
    public function add(Controls\Control $control) {
        array_push($this->controls, $control);
    }
    
}