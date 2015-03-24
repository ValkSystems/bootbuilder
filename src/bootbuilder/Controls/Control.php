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

    public function __construct($name, $id = null, $value = null) {
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->class = "";
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
     * Set the class string (can hold multiple classes, seperated with spaces)
     * @param string $class
     */
    public function setClass($class) {
        $this->class = $class;
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