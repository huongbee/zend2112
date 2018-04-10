<?php
namespace User\Form;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Validator\StringLength; 
use Zend\Filter; 
use Zend\Validator\NotEmpty;


class LoginForm extends Form{

    function __construct(){
        
        parent::__construct();
        //email
        $this->add([
            'type'=>'email',
            'name'=>'email',
            'options'=>[
                'label'=>'Email: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-4"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập email"
            ]
        ]);
        //password
        $this->add([
            'type'=>'Password',
            'name'=>'password',
            'options'=>[
                'label'=>'Mật khẩu mới: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-4"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập mật khẩu mới"
            ]
        ]);
       
        //btn
        $this->add([
            'type'=>'Submit',
            'name'=>'btnSubmit',
            'attributes'=>[
                'class'=>'btn btn-primary',
                'value'=>'Login'
            ]
        ]);

    }
}