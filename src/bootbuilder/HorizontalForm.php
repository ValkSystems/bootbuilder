<?php

namespace bootbuilder;

class HorizontalForm extends Form {
    private $labelcol = "col-md-3";
    private $controlcol = "col-md-9";
    
    public function __construct($label_col = "col-md-3", $control_col = "col-md-9") {
        parent::__construct();
        
        $this->class = "form-horizontal";
        
        $this->labelcol = $label_col;
        $this->controlcol = $control_col;
    }
    
    public static function renderControl(\bootbuilder\Controls\Control $control, $return = false) {
        // Form group
        $html = "<div class='form-group'>";
        
        // Label
        $html .= "<label for='$control->getId()' class='control-label $this->labelcol'>" . $control->getLabel() . "</label>";
        
        // Control
        $html .= "<div class='$this->controlcol'>";
        
        $control->setClass("form-control " . $control->getClass());
        $html .= $control->renderBasic();
        
        $html .= "</div>"; // Close control div
        $html .= "</div>"; // Close form-group div
        
        return $html;
    }


}