<?php
namespace User\Form;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Validator\StringLength; 
use Zend\Filter; 
use Zend\Validator\NotEmpty;
use Zend\Validator\EmailAddress;

class ForgetPasswordForm extends Form{

    function __construct(){
        parent::__construct();

        //email
        $this->add([
            'type'=>'Email',
            'name'=>'email',
            'options'=>[
                'label'=>'Email: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-4"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập email tạo tài khoản"
            ]
        ]);
        //btn
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

        $filter->add([
            'name'=>'email',
            'required'=>true,
            'filters'=>[
                ['name'=>Filter\StripNewlines::class]
            ],
            'validators'=>[
                [
                    'name'=>"NotEmpty",
                    'options'=>[
                        'messages'=>[
                            NotEmpty::IS_EMPTY=>"Vui lòng nhập email"
                        ],
                         'break_chain_on_failure'=>true,
                    ] 
                ],
                [
                    'name'=>'StringLength',
                    'options'=>[
                        'min'=>5,
                        'messages'=>[
                            StringLength::TOO_SHORT=>'Email ít nhất %min% kí tự, chuỗi hiện tại có %length% kí tự'
                        ],
                        'break_chain_on_failure'=>true
                    ]
                ],
                [
                    'name'=>'emailaddress',
                    'options'=>[
                        'messages'=>[
                            EmailAddress::INVALID=>'Email chưa đúng định dạng'
                        ],
                        'break_chain_on_failure'=>true
                    ]
                ]
            ]
        ]);

    }
}