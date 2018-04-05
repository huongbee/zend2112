<?php
namespace User\Form;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Validator\StringLength; 
use Zend\Filter; 
use Zend\Validator\NotEmpty;


class ResetPasswordForm extends Form{

    private $action = 'change-pw';
    function __construct($action = 'change-pw'){
        $this->action = $action;
        parent::__construct();

        if($this->action == 'change-pw'){
            //old_password
            $this->add([
                'type'=>'Password',
                'name'=>'old_password',
                'options'=>[
                    'label'=>'Mật khẩu cũ: ',
                    'label_attributes'=>[
                        'class'=>"control-label col-sm-4"
                    ]
                ],
                'attributes'=>[
                    'class'=>'form-control',
                    'placeholder'=>"Nhập mật khẩu cũ"
                ]
            ]);
        }
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
        //confirm_password
        $this->add([
            'type'=>'Password',
            'name'=>'confirm_password',
            'options'=>[
                'label'=>'Nhập lại mật khẩu mới: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-4"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập lại mật khẩu mới"
            ]
        ]);
        //btn
        $this->add([
            'type'=>'Submit',
            'name'=>'btnSubmit',
            'attributes'=>[
                'class'=>'btn btn-primary',
                'value'=>'Change'
            ]
        ]);


        //filter + validate
    }
}