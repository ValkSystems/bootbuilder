<?php
namespace bootbuilder\Controls;

class Submit extends Button {
    
    
    public function renderBasic() {
        $html = "<button type='submit'";
        $html .= " " . $this->getCompiledAttributes("btn $this->buttonsize $this->buttonstyle");
        $html .= ">";
        $html .= $this->value;
        $html .= "</button>";
        return $html;
    }

}