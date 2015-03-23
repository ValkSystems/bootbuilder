<?php
namespace bootbuilder\Controls;

use bootbuilder;

abstract class Control {
    private $name;
    private $id;
    private $class;
    private $value;
    private $label;
    
    public function __construct($name, $id = null, $value = null) {
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
    }
    
    /**
     * Get ID of control
     * @return string|null
     */
    protected function getId() {
        return $this->id;
    }
    
    /**
     * Get Name of control
     * @return string
     */
    protected function getName() {
        return $this->name;
    }
    
    /**
     * Get value of control
     * @return mixed
     */
    protected function getValue() {
        return $this->value;
    }
    
    /**
     * Output the control
     */
    public function __toString() {
        \bootbuilder\BootBuilder::getForm()->renderControl($this);
    }
}