<?php
namespace bootbuilder\Controls;

class CustomHtml extends Control {
    
    private $html;
    
    public function __construct($html = "") {
        parent::__construct("");
        $this->html = $html;
        $this->_plain = true;
    }
    
    /**
     * Set HTML
     * @param string $html
     */
    public function setHtml($html) {
        $this->html = $html;
    }
    
    /**
     * Append HTML to end of current html
     * @param string $html
     */
    public function appendHtml($html) {
        $this->html .= $html;
    }
    
    /**
     * Get Current HTML
     * @return string
     */
    public function getHtml() {
        return $this->html;
    }
    
    /**
     * Render custom html
     */
    public function renderBasic() {
        return $this->html;
    }

}