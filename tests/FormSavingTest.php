<?php

use bootbuilder\BootBuilder;
use bootbuilder\Validation\Validator;
use bootbuilder\Controls\Email;

if(!isset($_SESSION)) $_SESSION = array();

class FormSavingTest extends PHPUnit_Framework_TestCase {
    
    private $form;
    private $loadedForm;
    
    protected function setUp() {
        // Prepare session
        Validator::clean();
        
        // Prepare form
        $this->form = BootBuilder::open();
        $this->form->setId("TestForm");
        $this->form->setDisplayErrors(true);
        
        $email1 = new Email("email1", "Email Sample");
        $email1->setRequired(true);
        
        $email2 = new Email("email2", "Email Sample 2");
        $email2->setRequired(true);
        
        $this->form->add($email1);
        $this->form->add($email2);
    }
    
    public function testSaveForm() {
        $this->form->save(true, false);
        
        $this->assertArrayHasKey("TestForm", $_SESSION['bbforms'], "Saving form in session");
    }
    
    protected function tearDown() {
        $this->form = null;
        $this->loadedForm = null;
        $_SESSION = array();
    }
    
}