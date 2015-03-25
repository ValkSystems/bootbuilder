<?php
namespace bootbuilder\Controls;

class File extends Control {
    
    
    public function renderBasic() {
        $html = "<input type='file'";
        $html .= " " . $this->getCompiledAttributes();
        $html .= ">";
        return $html;
    }

}