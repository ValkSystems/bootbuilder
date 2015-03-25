<?php
namespace bootbuilder\Pane;

/**
 * StackPane can be used for Checkbox and Radio groups, it will show every
 * element on another new row.
 */
class StackPane extends Pane {
    
    public function renderBasic() {
        $html = "<div class='stackpane'>";
        foreach($this->controls as $control) {
            $html .= $control->renderBasic();
        }
        $html .= "</div>";
        return $html;
    }

}