<?php

use bootbuilder\BootBuilder;
use bootbuilder\Validation\Validator;
use bootbuilder\Controls\Email;

if(!isset($_SESSION)) $_SESSION = array();

class FormValidationTest extends PHPUnit_Framework_TestCase {
    
    private $form;
    /** @var \bootbuilder\Validation\ValidationResult */
    private $validationresult;
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
        
        $this->form->save(true, false);
        
        $validator = new Validator();
        $this->validationresult = $validator->load(array("bootbuilder-form" => "TestForm", "email1" => "fakeemail", "email2" => "valid@email.com"), false)->validate();
        $this->loadedForm = $validator->getForm();
    }
    
    public function testValidating() {
        $this->assertTrue($this->validationresult->hasError(), "Should have an error in the email field 1");
    }
    
    public function testErrorState() {
        $this->assertContains("has-error", $this->loadedForm->render(true));
    }
    
    protected function tearDown() {
        $this->form = null;
        $this->loadedForm = null;
        $this->validationresult = null;
        $_SESSION = array();
    }
    
}