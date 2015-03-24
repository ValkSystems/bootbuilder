<?php
namespace bootbuilder\Controls;

class TextArea extends Control {
    private $rows = 3;
    
    /**
     * Set number of rows, default is 3
     * @param int $rows
     */
    public function setRows($rows) {
        $this->rows = $rows;
    }
    
    /**
     * Get number of rows
     * @return int
     */
    public function getRows() {
        return $this->rows;
    }
    
    /**
     * Render basics of textarea
     */
    public function renderBasic() {
        $html = "<textarea rows='$this->rows'";
        $html .= " " . $this->getCompiledAttributes("form-control");
        $html .= ">";
        $html .= $this->value;
        $html .= "</textarea>";
        return $html;
    }

}