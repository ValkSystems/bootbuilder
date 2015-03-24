<?php
namespace bootbuilder\Controls;

class Text extends Control {
    
    /**
     * Render basics of text field
     */
    public function renderBasic() {
        $html = "<input type='text'";
        if($this->id) $html .= " id='$this->id'";
        if($this->class) $html .= " class='$this->class'";
        if($this->name) $html .= " name='$this->name'";
        if($this->placeholder) $html .= " placeholder='$this->placeholder'";
        if($this->value) $html .= " value='$this->value'";
        $html .= ">";
        return $html;
    }

}