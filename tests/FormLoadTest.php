<?php

use bootbuilder\BootBuilder;
use bootbuilder\Validation\Validator;
use bootbuilder\Controls\Email;

if(!isset($_SESSION)) $_SESSION = array();

class FormLoadTest extends PHPUnit_Framework_TestCase {
    
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
        
        $this->form->save(true, false);
    }
    
    public function testLoadForm() {
        $validator = new Validator();
        $this->validationresult = $validator->load(array("bootbuilder-form" => "TestForm", "email1" => "fakeemail", "email2" => "valid@email.com"), false);
        $this->loadedForm = $validator->getForm();
        
        $this->assertNotNull($this->loadedForm, "Loading form");
        $this->assertInstanceOf("\bootbuilder\Form", $this->loadedForm);
    }
    
    protected function tearDown() {
        $this->form = null;
        $this->loadedForm = null;
        $_SESSION = array();
    }
}