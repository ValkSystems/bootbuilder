<?php
namespace bootbuilder;



class BootBuilder {
    
    /** @var Form */
    private static $form;
    
    /**
     * Open a new Form
     * @return NormalForm
     */
    public static function open() {
        self::$form = new NormalForm;
        return self::$form;
    }
    
    /**
     * Open a new horizontal Form
     * @return HorizontalForm
     */
    public static function openHorizontal() {
        self::$form = new HorizontalForm;
        return self::$form;
    }
    
    /**
     * Get current form
     * @return null|Form
     */
    public static function getForm() {
        return self::$form;
    }
    
}