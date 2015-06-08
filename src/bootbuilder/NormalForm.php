<?php

namespace bootbuilder;

class NormalForm extends Form {
    
    public function __construct() {
        parent::__construct();
    }

    public static function renderControl(\bootbuilder\Controls\Control $control, $return = false) {
        // Form group
        $html = "<div class='form-group";
        
        if ($control->isErrorState() && self::$displayerrors) {
            $html .= " has-error";
        }
        
        $html .= "'>";
        
        // Label
        if(!$control instanceof \bootbuilder\Controls\Checkbox && !$control instanceof \bootbuilder\Controls\Radio) {
            $html .= "<label class='control-label' for='{$control->getId()}'>" . $control->getLabel() . "</label>";
        }
        
        // Control        
        $html .= $control->renderBasic();
        
        // HelpText
        if($control->getHelpText() !== null && strlen($control->getHelpText()) > 0) {
            $html .= "<span class='help-block'>" . $control->getHelpText() . "</span>";
        }
        
        $html .= "</div>"; // Close form-group div
        
        return $html;
    }

}