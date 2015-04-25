<?php

use bootbuilder\BootBuilder;
use bootbuilder\Controls\Text;
use bootbuilder\Controls\Checkbox;
use bootbuilder\Pane\StackPane;
use bootbuilder\Controls\CustomHtml;

class BootBuilderTest extends PHPUnit_Framework_TestCase {
    
    public function testFormControlAttributes() {
        $html = new Text("SampleName", "sampleLabel", "sampleid", "SAMPLEVALUE");
        $html = $html->renderBasic();
        $this->assertContains("SAMPLEVALUE", $html);
        $this->assertContains("SampleName", $html);
        $this->assertContains("sampleid", $html);
    }
    
    public function testFormHasId() {
        $form = BootBuilder::open();
        $form->setId("TESTID");
        $html = $form->render(true);
        $this->assertContains("TESTID", $html);
    }
    
    public function testHorizontalFormCustomColumns() {
        $form = BootBuilder::openHorizontal();
        $form->setLabelCol("col-md-4");
        $form->setControlCol("col-md-8");
        
        $form->add(new Text("test"));
        
        $html = $form->render(true);
        $this->assertContains("col-md-4", $html);
        $this->assertContains("col-md-8", $html);
    }
    
    public function testFormHtml() {
        $form = BootBuilder::open();
        $form->setMethod("test.php");
        $form->add(new Text("sample_text"));
        $boxgroup = new StackPane("Sample checkbox");
        $boxgroup->addControl(new Checkbox("sample_unchecked"));
        $c = new Checkbox("sample_checked");
        $c->setChecked(true);
        $c->setDisabled(true);
        $boxgroup->addControl($c);
        $form->add($boxgroup);
        
        $html = $form->render(true);
        
        $this->assertContains("checkbox", $html);
        $this->assertContains("<form", $html);
        $this->assertContains("disabled", $html);
        $this->assertContains("stackpane", $html);
        $this->assertContains($c->getId(), $html); // Dynamic id's
    }
    
    public function testCustomHtml() {
        $chtml = new CustomHtml();
        
        $this->assertEquals("", $chtml->getHtml());
        
        $chtml->setHtml("<a>testing</a>");
        
        $this->assertEquals("<a>testing</a>", $chtml->getHtml());
        $this->assertEquals("<a>testing</a>", $chtml->renderBasic());
        
        $chtml->appendHtml("Seems Fine!");
        
        $this->assertEquals("<a>testing</a>Seems Fine!", $chtml->getHtml());
    }
}