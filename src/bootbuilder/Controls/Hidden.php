<?php
namespace bootbuilder\Controls;

class Hidden extends Control {
    
    public function __construct($name, $value = "") {
        $this->name = $name;
        $this->value = $value;
        $this->_plain = true;
    }
    
    public function renderBasic() {
        $html = "<input type='hidden' name='$this->name' value='$this->value'";
        if($this->id) $html .= " id='$this->id'";
        $html .= ">";
        return $html;
    }

}