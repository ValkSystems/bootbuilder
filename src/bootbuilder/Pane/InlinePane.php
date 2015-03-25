<?php
namespace bootbuilder\Pane;

/**
 * InlinePane can be used on checkbox and radio controls, it will show the
 * controls with the in-line style.
 * 
 * @link http://getbootstrap.com/css/#inline-checkboxes-and-radios
 */
class InlinePane extends Pane {
    
    public function renderBasic() {
        $html = "<div class='inlinepane'>";
        foreach($this->controls as $control) {
            if($control instanceof \bootbuilder\Controls\Checkbox) {
                $html .= $control->renderInline();
            }else{
                $html .= $control->renderBasic();
            }
        }
        $html .= "</div>";
        return $html;
    }

}