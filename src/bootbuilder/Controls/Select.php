<?php
namespace bootbuilder\Controls;

class Select extends Control {
    private $options = array();
    private $multiple = false;
    
    public function __construct($name, $label = "", $id = null, $value = null) {
        parent::__construct($name, $label, $id, $value);
    }
    
    /**
     * Set multiple state
     * @param boolean $multiple
     */
    public function setMultiple($multiple) {
        $this->multiple = $multiple;
    }
    
    /**
     * Is a multiple select field
     * @return boolean
     */
    public function isMultiple() {
        return $this->multiple;
    }
    
    /**
     * Set options, multidimensional array, value => text
     * @param array $options
     */
    public function setOptions($options) {
        $this->options = $options;
    }
    
    /**
     * Get options
     * @return array
     */
    public function getOptions() {
        return $this->options;
    }
    
    public function renderBasic() {
        $html = "<select " . $this->getCompiledAttributes("form-control", true) . " " . ($this->multiple ? "multiple" : "") . ">";
        foreach($this->options as $value => $text) {
            $html .= "<option value='$value'" . ($this->value == $value ? " selected" : "") . ">" . $text . "</option>";
        }
        $html .= "</select>";
        return $html;
    }

}