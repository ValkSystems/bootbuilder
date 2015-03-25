<?php
namespace bootbuilder\Controls;

abstract class Control {
    protected $name;
    protected $id;
    protected $class;
    protected $value;
    protected $label;
    protected $placeholder;
    protected $disabled = false;
    protected $readonly = false;
    
    protected $_plain = false;

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
     * Get placeholder text
     * @return string
     */
    public function getPlaceholder() {
        return $this->placeholder;
    }
    
    /**
     * Set disabled state on the control
     * Be aware that a disabled control not always submit it current contents with a post or get request, use readonly instead.
     * @param boolean $disabled
     */
    public function setDisabled($disabled) {
        if($disabled === true || $disabled === false) $this->disabled = $disabled;
    }
    
    /**
     * Is the control disabled?
     * @return boolean
     */
    public function isDisabled() {
        return $this->disabled;
    }
    
    /**
     * Set readonly state
     * @param boolean $readonly
     */
    public function setReadOnly($readonly) {
        if($readonly === true || $readonly === false) $this->readonly = $readonly;
    }
    
    /**
     * Is the control readonly?
     * @return boolean
     */
    public function isReadOnly() {
        return $this->readonly;
    }
    
    /**
     * Does this control needs futhur rendering, or is it a plain control (no styles, no bootstrap)
     * @return boolean
     */
    public function isPlainControl() {
        return $this->_plain;
    }
    
    /**
     * Compile the HTML attributes for using in the controls tag
     * @return string Compiled attributes
     */
    protected function getCompiledAttributes($prependClass = "") {
        $attrs = "";
        if($this->id) $attrs .= " id='$this->id'";
        $attrs .= " class='$prependClass $this->class'";
        if($this->name) $attrs .= " name='$this->name'";
        if($this->placeholder) $attrs .= " placeholder='$this->placeholder'";
        if($this->value) $attrs .= " value='$this->value'";
        if($this->disabled === true) $attrs .= " disabled";
        if($this->readonly === true) $attrs .= " readonly";
        
        // Trim and return the compiled attributes
        return rtrim(ltrim($attrs));
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