<?php
namespace bootbuilder\Controls;

class Number extends Control {
    
    /**
     * Render basics of text field
     */
    public function renderBasic() {
        $html = "<input type='number'";
        $html .= " " . $this->getCompiledAttributes("form-control");
        $html .= ">";
        return $html;
    }

}