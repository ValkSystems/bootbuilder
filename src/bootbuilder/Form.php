<?php

namespace bootbuilder;

abstract class Form {
    protected $controls;
    protected $action;
    protected $method = "get";
    protected $class;
    protected $id;
    protected $enctype;
    protected $custom;
    
    protected static $displayerrors = true;

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
        if($this->enctype) $html .= " enctype='$this->enctype'";
        if($this->custom) $html .= " $this->custom";
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
     * @param \BootBuilder\Controls\Control $control the control to render
     * @param boolean $return Do you want to return the HTML?
     */
    public static function renderControl(\bootbuilder\Controls\Control $control, $return = false) {
        return $control->renderBasic();
    }
    
    /**
     * Add control to form
     * @param \BootBuilder\Controls\Control $control Control to add
     */
    public function add(Controls\Control $control) {
        array_push($this->controls, $control);
    }
    
    /**
     * Add multiple controls to form
     * @param \BootBuilder\Controls\Control $control,... Multiple controls
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
    
    /**
     * Set display error class state on controls
     * @param boolean $displayerrors
     */
    public function setDisplayErrors($displayerrors) {
        self::$displayerrors = $displayerrors;
    }
    
    /**
     * Will show error state on controls
     * @return boolean
     */
    public function isDisplayingErrors() {
        return self::$displayerrors;
    }
    
    /**
     * Get raw controls array
     * @return array array with controls
     */
    public function getRawControls() {
        return $this->controls;
    }
    
    /**
     * Replace current control in array with new one
     * @param int $nr
     * @param mixed $control
     */
    public function replaceControl($nr, $control) {
        if(isset($this->controls[$nr])) {
            $this->controls[$nr] = $control;
        }
    }

    /**
     * Set enctype in form
     * @param $enctype string
     */
    public function setEnctype($enctype) {
        $this->enctype = $enctype;
    }

    /**
     * Get enctype in form
     * @return string|null
     */
    public function getEnctype() {
        return $this->enctype;
    }

    /**
     * Set custom attribute(s)
     * @param $custom string [key="value"]
     */
    public function setCustom($custom) {
        $this->custom = $custom;
    }

    /**
     * Get custom attribute(s)
     * @return string|null
     */
    public function getCustom() {
        return $this->custom;
    }
    
    /**
     * Parse Posted Parameters into controls
     * @param mixed $parameters
     */
    public function parseParameters($parameters) {
        for($i = 0; $i < count($this->controls); $i++) {
            $this->controls[$i] = $this->parseParameterControl($this->controls[$i], $parameters);
        }
    }
    
    /**
     * Parse control
     * @param mixed $control
     * @param array $parameters
     * @return mixed
     */
    private function parseParameterControl($control, $parameters) {
        if($control instanceof \bootbuilder\Pane\Pane) {
            $control->parseParameters($parameters);
        }elseif($control instanceof \bootbuilder\Controls\Control) {
            if(isset($parameters[$control->getName()])) {
                if($control instanceof \bootbuilder\Controls\Checkbox) {
                    if($control instanceof \bootbuilder\Controls\Radio) {
                        if($control->getValue() == $parameters[$control->getName()]) {
                            $control->setChecked(true);
                        }else{
                            $control->setChecked(false);
                        }
                    }else{
                        $control->setChecked(true);
                    }
                }else{
                    $control->setValue(htmlentities($parameters[$control->getName()]));
                }
            }
        }
        
        return $control;
    }
    
    /**
     * Save form for validation
     * @param boolean $replace set false if you have multiple forms on one page
     * @param boolean $prepare prepare session, false on unittesting
     */
    public function save($replace = true, $prepare = true) {
        $this->add(new \bootbuilder\Controls\Hidden("bootbuilder-form", $this->id));
        
        if($replace) {
            \bootbuilder\Validation\Validator::clean();
        }
        
        \bootbuilder\Validation\Validator::save($this, $this->id, $prepare);
    }
}