<?php

namespace bootbuilder;

abstract class Form {
    
    /**
     * Render a form Control
     * @param Control
     */
    public static function renderControl($control);
    
    /**
     * Close the form
     */
    public function close();
    
    /**
     * Render the form HTML, when using buffer
     */
    public function render();
}