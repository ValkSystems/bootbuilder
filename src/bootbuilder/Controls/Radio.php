<?php
namespace bootbuilder\Controls;

class Radio extends Checkbox {
    
    
    public function renderBasic() {
        $html = "<div class='radio " . ($this->disabled ? "disabled" : "") . "'>";
        $html .= "<label>";
        $html .= "<input type='radio' " . ($this->checked === true ? "checked" : "") . " " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        $html .= "</div>";
        return $html;
    }

}