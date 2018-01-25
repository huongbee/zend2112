<?php
use Zend\Form\Element;
use Zend\Form\Form;

class FormElement extends Form{
    function __construct(){
        parent::__construct();

        //textbox
        /**
         * Fullname: <input name="fullname" >
         */
        $fullname = new Element('fullname');
        $fullname->setLabel("Fullname: ");
        $fullname->setAttribute('placeholder',"Enter Fullname");
        $fullname->setAttributes([
            'id'=>'fullname',
            'class'=>'form-control'
        ]);

        $this->add($fullname);


    }
}


?>