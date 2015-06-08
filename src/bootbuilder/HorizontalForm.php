<?php

namespace bootbuilder;

class HorizontalForm extends Form {
    private static $labelcol = "col-md-3";
    private static $controlcol = "col-md-9";
    
    public function __construct($label_col = "col-md-3", $control_col = "col-md-9") {
        parent::__construct();
        
        $this->class = "form-horizontal";
        
        self::$labelcol = $label_col;
        self::$controlcol = $control_col;
    }
    
    /**
     * Set the column style for the labels (left column)
     * @param string $label_col
     */
    public function setLabelCol($label_col) {
        self::$labelcol = $label_col;
    }
    
    /**
     * Set the column style for the controls and panes (right column)
     * @param string $control_col
     */
    public function setControlCol($control_col) {
        self::$controlcol = $control_col;
    }
    
    public static function renderControl(\bootbuilder\Controls\Control $control, $return = false) {
        // Form group
        $html = "<div class='form-group";
        
        if($control->isErrorState() && self::$displayerrors) {
            $html .= " has-error";
        }
        
        $html .= "'>";
            
        // Label
        if(!$control instanceof \bootbuilder\Controls\Checkbox && !$control instanceof \bootbuilder\Controls\Radio) {
            $html .= "<label for='{$control->getId()}' class='control-label " . self::$labelcol . "'>" . $control->getLabel() . "</label>";
        }else{
            $html .= "<label class='control-label " . self::$labelcol . "'></label>";
        }
        
        // Control
        $html .= "<div class='" . self::$controlcol . "'>";
        
        $html .= $control->renderBasic();
        
        // HelpText
        if($control->getHelpText() !== null && strlen($control->getHelpText()) > 0) {
            $html .= "<span class='help-block'>" . $control->getHelpText() . "</span>";
        }
        
        $html .= "</div>"; // Close control div
        $html .= "</div>"; // Close form-group div
        
        return $html;
    }


}