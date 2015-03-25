<?php
namespace bootbuilder\Controls;

class Checkbox extends Control {
    protected $checked = false;
    protected $labelclass;
    
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
    
    /**
     * Set the class string for the label
     * @param string $class
     */
    public function setLabelClass($class) {
        $this->labelclass = $class;
    }
    
    public function renderBasic() {
        $html = "<div class='checkbox " . ($this->disabled ? "disabled" : "") . "'>";
        $html .= "<label " . ($this->labelclass ? "class='$this->labelclass'" : "") . ">";
        $html .= "<input type='checkbox' " . ($this->checked === true ? "checked" : "") . " " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        $html .= "</div>";
        return $html;
    }
    
    public function renderInline() {
        $html = "<label class='checkbox-inline'>";
        $html .= "<input type='checkbox' " . ($this->checked === true ? "checked" : "") . " " . $this->getCompiledAttributes() . ">";
        $html .= " " . $this->label;
        $html .= "</label>";
        return $html;
    }

}