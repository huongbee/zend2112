<?php
namespace Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Validator\StringLength; 
use Zend\Filter; 

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

        $this->filterForm();
    }

    function filterForm(){
        $filter = new InputFilter();
        $this->setInputFilter($filter);

        //fullname: required, min:5
        $filter->add([
            'name'=>'fullname',
            'required'=>true,
            'filters'=>[
                ['name'=>Filter\StripNewlines::class],
                ['name'=>Filter\StringToUpper::class]
            ],
            'validators'=>[
                [
                    'name'=>'StringLength',
                    'options'=>[
                        'min'=>5,
                        'messages'=>[
                            StringLength::TOO_SHORT=>'Họ tên ít nhất %min% kí tự, chuỗi hiện tại %length% kí tự'
                        ]
                    ]
                ]
            ]
        ]);

        //email : required, min:10, max:50; valid

        //title: required, max: 100,

        //message: required

    }
}


?>