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
        if(!$control instanceof \bootbuilder\Controls\Checkbox && !$control instanceof \bootbuilder\Controls\Radio) {
            $html .= "<label for='{$control->getId()}'>" . $control->getLabel() . "</label>";
        }
        
        // Control        
        $html .= $control->renderBasic();
        
        $html .= "</div>"; // Close form-group div
        
        return $html;
    }

}