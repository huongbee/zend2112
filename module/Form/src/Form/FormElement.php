<?php
namespace Form\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class FormElement extends Form{
    function __construct(){
        parent::__construct();

            // $this->setAttributes([
            //     'method'=>"GET",
            //     'action'=>"/add/user"
            // ]);


        //textbox
        /**
         * Fullname: <input name="fullname" >
         */
        $fullname = new Element('fullname');
        $fullname->setLabel("Họ tên: ")
                ->setLabelAttributes([
                    'class'=>"col-sm-2"
                ]);
        $fullname->setAttribute('placeholder',"Enter Fullname");
        $fullname->setAttributes([
            'id'=>'fullname',
            'class'=>'form-control',
            "value"=>"Khoa Phạm"
        ]);
        $this->add($fullname);

        $name = new Element\Text('name');
        $name->setLabel("Username: ")
                ->setLabelAttributes([
                    'class'=>"col-sm-2"
                ]);
        $name->setAttribute('placeholder',"Enter Username");
        $name->setAttributes([
            'id'=>'name',
            'class'=>'form-control'
        ]);
        $this->add($name);


    }
}


?>