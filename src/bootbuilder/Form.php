<?php

namespace bootbuilder;

abstract class Form {
    protected $controls;
    protected $action;
    protected $class;
    protected $id;

    public function __construct() {
        $this->controls = array();
    }
    
    /**
     * Render form
     * @param boolean $return Do you want to return the HTML?
     */
    public function render($return = false) {
        $html = "<form";
        if($this->id) $html .= " id='$this->id'";
        if($this->class) $html .= " class='$this->class'";
        if($this->action || $this->action == "") $html .= " action='$this->action'";
        $html .= ">";
        
        // Render all the controls
        foreach($this->controls as $control) {
            if($control->isPlainControl()){
                $html .= $control->renderBasic();
            }else{
                $html .= $this->renderControl($control, true);                
            }
        }
        
        // Close the form
        $html .= "</form>";
        
        // Return or echo
        if($return) return $html;
        echo $html;
    }
    
    /**
     * Render a form Control
     * @param \Controls\Control $control the control to render
     * @param boolean $return Do you want to return the HTML?
     */
    public abstract static function renderControl(\bootbuilder\Controls\Control $control, $return = false);
    
    /**
     * Add control to form
     */
    public function add(Controls\Control $control) {
        array_push($this->controls, $control);
    }
    
    /**
     * Set form tag class
     * @param string $class
     */
    protected function setClass($class) {
        $this->class = $class;
    }
    
    /**
     * Set ID of form
     * @param string $id
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    /**
     * Set action of form
     * @param string $action
     */
    public function setAction($action) {
        $this->action = $action;
    }
    
}