<?php
namespace bootbuilder\Controls;

class Button extends Control {
    protected $buttonsize;
    protected $buttonstyle;
    
    public function __construct($value, $buttonsize = "btn-md", $buttonstyle = "btn-default") {
        parent::__construct(null, null, null, $value);
        $this->buttonsize = $buttonsize;
        $this->buttonstyle = $buttonstyle;
    }
    
    public function renderBasic() {
        $html = "<button type='button'";
        if($this->name) $html .= " name='$this->name'";
        if($this->id) $html .= " id='$this->id'";
        $html .= " class='btn $this->buttonsize $this->buttonstyle $this->class'>";
        $html .= $this->value;
        $html .= "</button>";
        return $html;
    }

}