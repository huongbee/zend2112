<?php
namespace User\Form;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Validator\StringLength; 
use Zend\Filter; 
use Zend\Validator\NotEmpty;
use Zend\Form\Element\Select;
use Zend\Form\Element\Textarea;
use  Zend\Validator\Digits;
use Zend\Form\Element\Checkbox;


class UserForm extends Form{

    public $action;
    function __construct($action='add'){
        $this->action = $action;
        parent::__construct();

        //fullname
        $this->add([
            'type'=>'Text',
            'name'=>'fullname',
            'options'=>[
                'label'=>'Họ tên: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập Họ tên đầy đủ"
            ]
        ]);

        //Email
        $this->add([
            'type'=>'Email',
            'name'=>'email',
            'options'=>[
                'label'=>'Email: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>'Nhập email'
            ]
        ]);

        //birthdate
        $this->add([
            'type'=>'Date',
            'name'=>'birthdate',
            'options'=>[
                'label'=>'Ngày sinh: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
            ]
        ]);

        //address
        $this->add([
            'type'=>'Text',
            'name'=>'address',
            'options'=>[
                'label'=>'Địa chỉ: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập địa chỉ"
            ]
        ]);
        //phone
        $this->add([
            'type'=>'Text',
            'name'=>'phone',
            'options'=>[
                'label'=>'Điện thoại: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập số điện thoại liên hệ"
            ]
        ]);
        
        //gender
        $this->add([
            'type'=>Select::class,
            'name'=>'gender',
            'options'=>[
                'label'=>'Giới tính: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ],
                'value_options'=>[
                    'nam'=>'Nam',
                    'nữ'=>'Nữ',
                    'khác'=>'Khác'
                ],
            ],
            'attributes'=>[
                'class'=>'form-control'
            ]
        ]);

        if($this->action =='add'){
            //password
            $this->add([
                'type'=>'Password',
                'name'=>'password',
                'options'=>[
                    'label'=>'Mật khẩu: ',
                    'label_attributes'=>[
                        'class'=>"control-label col-sm-2"
                    ]
                ],
                'attributes'=>[
                    'class'=>'form-control',
                    'placeholder'=>"Nhập mật khẩu"
                ]
            ]);
            //confirm_password
            $this->add([
                'type'=>'Password',
                'name'=>'confirm_password',
                'options'=>[
                    'label'=>'Nhập lại mật khẩu: ',
                    'label_attributes'=>[
                        'class'=>"control-label col-sm-2"
                    ]
                ],
                'attributes'=>[
                    'class'=>'form-control',
                    'placeholder'=>"Nhập lại mật khẩu"
                ]
            ]);
        }
        //btn

        if($this->action =='add'){
            $this->add([
                'type'=>'Submit',
                'name'=>'btnSubmit',
                'attributes'=>[
                    'class'=>'btn btn-primary',
                    'value'=>'Register'
                ]
            ]);
        }
        else{
            $this->add([
                'type'=>'Submit',
                'name'=>'btnSubmit',
                'attributes'=>[
                    'class'=>'btn btn-primary',
                    'value'=>'Update'
                ]
            ]);
        }
        $this->filterForm();
    }

    function filterForm(){
        $filter = new InputFilter();
        $this->setInputFilter($filter);

        //name: required, min:5
        $filter->add([
            'name'=>'fullname',
            'required'=>true,
            'filters'=>[
                ['name'=>Filter\StripNewlines::class]
            ],
            'validators'=>[
                [
                    'name'=>"NotEmpty",
                    'options'=>[
                        'messages'=>[
                            NotEmpty::IS_EMPTY=>"Vui lòng nhập họ tên"
                        ],
                         'break_chain_on_failure'=>true,
                    ] 
                ]
            ]
        ]);

    }
}


?>