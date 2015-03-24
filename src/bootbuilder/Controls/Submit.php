<?php
namespace bootbuilder\Controls;

class Submit extends Button {
    
    
    public function renderBasic() {
        $html = "<button type='submit'";
        if($this->name) $html .= " name='$this->name'";
        if($this->id) $html .= " id='$this->id'";
        $html .= " class='btn $this->buttonsize $this->buttonstyle $this->class'>";
        $html .= $this->value;
        $html .= "</button>";
        return $html;
    }

}