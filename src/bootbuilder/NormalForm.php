<?php

namespace bootbuilder;

class NormalForm extends Form {
    
    public function __construct() {
        parent::__construct();
    }

    public static function renderControl(\bootbuilder\Controls\Control $control, $return = false) {
        // Form group
        $html = "<div class='form-group'>";
        
        // Label
        $html .= "<label for='$control->getId()'>" . $control->getLabel() . "</label>";
        
        // Control        
        $control->setClass("form-control " . $control->getClass());
        $html .= $control->renderBasic();
        
        $html .= "</div>"; // Close form-group div
        
        return $html;
    }

}