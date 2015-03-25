<?php
namespace bootbuilder\Controls;

class Checkbox extends Control {
    
    
    public function renderBasic() {
        $html = "<div class='checkbox " . ($this->disabled ? "disabled" : "") . "'>";
        $html .= "<label>";
        $html .= "<input type='checkbox' " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        $html .= "</div>";
        return $html;
    }

}