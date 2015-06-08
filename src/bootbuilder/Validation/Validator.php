<?php

namespace bootbuilder\Validation;

/**
 * Validator class
 * Warning, this will mostly change in upcomming releases, not yet stable!
 */
class Validator {

    /** @var \bootbuilder\Form */
    private $form;
    private $parameters;

    /**
     * Save Form into session, and prepare it for validation later on
     * @param \bootbuilder\Form $form
     * @param int $formid
     * @param boolean $prepare prepare the sesison, false on unittesting
     */
    public static function save($form, $formid, $prepare = true) {
        if($prepare) {
            self::prepareSession();
        }
        
        // Save in session
        $_SESSION['bbforms'][$formid] = $form;
    }

    /**
     * Load previous form from session
     * @param array $parameters POST/GET parameters array
     * @param boolean $prepare Prepare session, false on unittesting
     * @return \bootbuilder\Validation\Validator
     */
    public function load($parameters, $prepare = true) {
        $this->parameters = $parameters;

        if($prepare) {
            $this->prepareSession();
        }

        if (isset($parameters['bootbuilder-form']) && isset($_SESSION['bbforms']) && isset($_SESSION['bbforms'][$parameters['bootbuilder-form']])) {
            $this->form = $this->loadForm($parameters['bootbuilder-form']);
            
            if ($this->form instanceof \bootbuilder\Form) {
                $this->form->parseParameters($parameters);
            }
        }else{
            $this->form = new \bootbuilder\NormalForm();
        }

        return $this;
    }

    /**
     * Validate the form controls, validates by the required status, and some specific control validations
     * such as email control
     * @return \bootbuilder\Validation\ValidationResult
     */
    public function validate() {
        $status = new ValidationResult();

        // Check if the form is loaded
        if (!$this->form instanceof \bootbuilder\Form) {
            $status->setError(true);
            return $status;
        }

        // Validate form controls (and panes)
        foreach ($this->form->getRawControls() as $nr => $control) {
            if(!$this->validateControl($control, $status)) {
                $status->setError(true);
                $control->setErrorState(true);
            }
            
            $this->form->replaceControl($nr, $control);
        }
        
        return $status;
    }
    
    /**
     * Get validated form
     * @return \bootbuilder\Form
     */
    public function getForm() {
        return $this->form;
    }
    
    /**
     * Validate single control (or pane with controls)
     * @param mixed $control
     * @return boolean Error found?
     */
    private function validateControl(&$control) {
        $status = true;
        
        // If the control is a pane, validate each control of the pane
        if ($control instanceof \bootbuilder\Pane\Pane) {
            foreach($control->getRawControls() as $panecontrol) {
                if(!$this->validateControl($panecontrol)) $status = false;
            }
            
        }elseif ($control instanceof \bootbuilder\Controls\Control) {
            // Normal control
            if(!$control->isValid()) $status = false;
        }
        
        return $status;
    }

    /**
     * Make sure you prepared the session for the Validator
     * @param boolean $removeold If using multiple forms, disable this.
     */
    public static function prepareSession() {
        if (session_status() == PHP_SESSION_NONE) {
            if (headers_sent()) {
                throw new \Exception("Headers already set, use Validator::prepareSession() in your header to start the HTTP Session");
            }else{
                session_start();
            }
        }
    }
    
    /**
     * Cleanup the session storage for forms
     */
    public static function clean() {
        if(isset($_SESSION['bbforms'])) {
            unset($_SESSION['bbforms']);
        }
    }

    /**
     * Try to load form from session
     * @param mixed $formid
     * @return \bootbuilder\Form|null
     */
    private function loadForm($formid) {
        if(isset($_SESSION['bbforms'][$formid])) {
            return $_SESSION['bbforms'][$formid];
        }
        return null;
    }

}
