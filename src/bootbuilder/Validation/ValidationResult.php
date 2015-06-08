<?php
namespace bootbuilder\Validation;

class ValidationResult {
    private $error = false;
    
    /**
     * Set error state
     * @param boolean $error
     * @return \bootbuilder\Validation\ValidationResult
     */
    public function setError($error) {
        $this->error = $error;
        return $this;
    }
    
    
    /**
     * Has Validation Error
     * @return boolean
     */
    public function hasError() {
        return $this->error;
    }
}