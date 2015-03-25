<?php
namespace bootbuilder\Controls;

class Radio extends Checkbox {
    
    
    public function renderBasic() {
        $html = "<div class='radio " . ($this->disabled ? "disabled" : "") . "'>";
        $html .= "<label " . ($this->labelclass ? "class='$this->labelclass'" : "") . ">";
        $html .= "<input type='radio' " . ($this->checked === true ? "checked" : "") . " " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        $html .= "</div>";
        return $html;
    }
    
    public function renderInline() {
        $html = "<label class='radio-inline'>";
        $html .= "<input type='radio' " . ($this->checked === true ? "checked" : "") . " " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        return $html;
    }

}