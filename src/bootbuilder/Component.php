<?php

namespace bootbuilder;

/**
 * Bootstrap component
 */
abstract class Component {
    private $name;
    
    public function __construct() {
        
    }
    
    /**
     * Set Component Name
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    /**
     * Get Component Name
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
}