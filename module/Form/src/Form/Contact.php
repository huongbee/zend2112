<?php
namespace Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class Contact extends Form{

    function __construct(){
        parent::__construct();

        $this->add([
            'type'=>Text::class,
            'name'=>'fullname',
            'options'=>[
                'label'=>'Fullname: ',
                'label_options'=>[
                    'class'=>"control-label"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Enter Fullname"
            ]
        ]);

        $this->add([
            'type'=>'Email',
            'name'=>'email',
            'options'=>[
                'label'=>'Email: ',
                'label_options'=>[
                    'class'=>"control-label"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Enter Email"
            ]
        ]);

        $this->add([
            'type'=>'Text',
            'name'=>'subject',
            'options'=>[
                'label'=>'Title: ',
                'label_options'=>[
                    'class'=>"control-label"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Enter Subject"
            ]
        ]);

        $this->add([
            'type'=>'Textarea',
            'name'=>'message',
            'options'=>[
                'label'=>'Your Message: ',
                'label_options'=>[
                    'class'=>"control-label"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control'
            ]
        ]);

        $this->add([
            'type'=>'Submit',
            'name'=>'btnSubmit',
            'attributes'=>[
                'class'=>'btn btn-primary',
                'value'=>'Send'
            ]
        ]);

        
    }
}

?>