<?php

namespace bootbuilder;

abstract class Form {
    protected $controls;
    protected $action;
    protected $method = "get";
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
        if($this->method) $html .= " method='$this->method'";
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
     * @param \Controls\Control $control Control to add
     */
    public function add(Controls\Control $control) {
        array_push($this->controls, $control);
    }
    
    /**
     * Add multiple controls to form
     * @param \Controls\Control $control,... Multiple controls
     */
    public function addAll() {
        if(func_num_args() > 0) {
            for($i = 0; $i < func_num_args(); $i++) {
                if(func_get_arg($i) instanceof \bootbuilder\Controls\Control){
                    array_push($this->controls, func_get_arg($i));
                }
            }
        }
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
    
    /**
     * Set the method for form handling (get or post)
     * @param string $method
     */
    public function setMethod($method) {
        $this->method = $method;
    }
    
}