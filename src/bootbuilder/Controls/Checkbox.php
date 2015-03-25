<?php
namespace bootbuilder\Controls;

class Checkbox extends Control {
    protected $checked = false;
    
    /**
     * Set Checked state
     * @param boolean $checked
     */
    public function setChecked($checked) {
        $this->checked = $checked;
    }
    
    /**
     * Get checked state
     * @return boolean
     */
    public function isChecked() {
        return $this->checked;
    }
    
    public function renderBasic() {
        $html = "<div class='checkbox " . ($this->disabled ? "disabled" : "") . "'>";
        $html .= "<label>";
        $html .= "<input type='checkbox' " . ($this->checked === true ? "checked" : "") . " " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        $html .= "</div>";
        return $html;
    }

}