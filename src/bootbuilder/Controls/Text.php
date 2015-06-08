<?php
namespace bootbuilder\Controls;

class Text extends Control {
    
    private $type = "text";
    
    /**
     * Render basics of text field
     */
    public function renderBasic() {
        $html = "<input type='" . $this->type . "'";
        $html .= " " . $this->getCompiledAttributes("form-control");
        $html .= ">";
        return $html;
    }
    
    /**
     * Set Custom input type
     * @param string $type
     */
    public function setType($type) {
        $this->type = $type;
    }
    
    /**
     * Get Custom input type
     * @return string type
     */
    public function getType() {
        return $this->type;
    }

}