<?php

namespace bootbuilder;

class HorizontalForm extends Form {
    
    /** @var array */
    private static $controls;
    
    public function __construct() {
        self::$controls = array();
    }
    
    public static function renderControl($control) {
        
    }
}