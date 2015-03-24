<?php
namespace bootbuilder\Controls;

class Text extends Control {
    
    /**
     * Render basics of text field
     */
    public function renderBasic() {
        $html = "<input type='text'";
        $html .= " " . $this->getCompiledAttributes("form-control");
        $html .= ">";
        return $html;
    }

}