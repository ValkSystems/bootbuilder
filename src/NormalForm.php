<?php

namespace bootbuilder;

class NormalForm extends Form {
    
    /** @var array */
    private static $controls;
    
    public function __construct() {
        self::$controls = array();
    }
}