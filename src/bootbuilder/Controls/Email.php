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
    
    /**
     * Validate email
     * @return boolean
     */
    public function isValid() {
        $valid = parent::isValid();
        if (!filter_var($this->getValue(), FILTER_VALIDATE_EMAIL)) {
            $valid = false;
        }
        
        return $valid;
    }

}