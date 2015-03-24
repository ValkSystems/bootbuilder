<?php
namespace bootbuilder\Controls;

class Email extends Control {
    
    /**
     * Render basics of text field
     */
    public function renderBasic() {
        $html = "<input type='email'";
        $html .= " " . $this->getCompiledAttributes("form-control");
        $html .= ">";
        return $html;
    }

}