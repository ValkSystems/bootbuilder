<?php
namespace bootbuilder\Pane;

abstract class Pane extends \bootbuilder\Controls\Control {
    /**
     * @var \bootbuilder\Controls\Control 
     */
    protected $controls;
    
    public function __construct($label, $id = null) {
        parent::__construct("", $label, $id, null);
        $this->controls = array();
    }
    
    /**
     * Add control to pane group
     * @param \bootbuilder\Controls\Control $control
     */
    public function addControl(\bootbuilder\Controls\Control $control) {
        array_push($this->controls, $control);
    }
    
    /**
     * Add multiple controls to pane group
     * @param \bootbuilder\Controls\Control $control,... Multiple controls
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
}
