<?php
namespace bootbuilder\Controls;

use bootbuilder;

abstract class Control {
    protected $name;
    protected $id;
    protected $class;
    protected $value;
    protected $label;
    protected $placeholder;

    public function __construct($name, $label = "", $id = null, $value = null) {
        $this->name = $name;
        $this->label = $label;
        if($id == null) $id = uniqid();
        $this->id = $id;
        $this->value = $value;
        $this->class = "";
    }
    
    
    /**
     * Get Name of control
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Get value of control
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }
    
    /**
     * Set the value of the control
     * @param mixed $value
     */
    public function setValue($value) {
        $this->value = $value;
    }
    
    /**
     * Set the HTML ID of the control
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    /**
     * Get the HTML ID tag of the control
     * @return string
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Set the class string (can hold multiple classes, seperated with spaces)
     * @param string $class
     */
    public function setClass($class) {
        $this->class = $class;
    }
    
    /**
     * Get current class string
     * @return string
     */
    public function getClass() {
        return $this->class;
    }
    
    /**
     * Add a class to the other classes this control already has
     * @param string $class
     */
    public function addClass($class) {
        $this->class .= " " . $class;
    }
    
    /**
     * Remove existing class from classes
     * @param string $class
     */
    public function removeClass($class) {
        $this->class = str_replace($class, "", $this->class);
    }
    
    /**
     * Set label of control
     * @param string $label
     */
    public function setLabel($label) {
        $this->label = $label;
    }
    
    /**
     * Get label of control
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }
    
    /**
     * Set placeholder text
     * @param string $placeholder
     */
    public function setPlaceholder($placeholder) {
        $this->placeholder = $placeholder;
    }
    
    /**
     * Render the basics of the input.
     */
    public abstract function renderBasic();
    
    /**
     * Output the control
     */
    public function __toString() {
        \bootbuilder\BootBuilder::getForm()->renderControl($this);
    }
}