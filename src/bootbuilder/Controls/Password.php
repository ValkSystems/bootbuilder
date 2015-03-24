<?php
namespace bootbuilder\Controls;

class Password extends Control {
    
    /**
     * Render basics of text field
     */
    public function renderBasic() {
        $html = "<input type='password'";
        $html .= " " . $this->getCompiledAttributes("form-control");
        $html .= ">";
        return $html;
    }

}