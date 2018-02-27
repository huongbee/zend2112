<?php
namespace Form\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Filter; 
use Zend\Validator\NotEmpty;

class UploadFile extends Form{

    function __construct(){
        parent::__construct();

        $this->add([
            'type'=>'file',
            'name'=>'file-upload',
            'options'=>[
                'label'=>"Choose File:"
            ],
            // 'attributes'=>[
            //     'required'=>true
            // ]
        ]);

        $this->add([
            'type'=>'Submit',
            'name'=>'btnSubmit',
            'attributes'=>[
                'class'=>'btn btn-primary',
                'value'=>'Upload'
            ]
        ]);

        $this->filterUploadFile();
    }


    function filterUploadFile(){
        $filter = new InputFilter();
        $this->setInputFilter($filter);

        $filter->add([
            'name'=>'file-upload',
            'required'=>true,
            'validators'=>[
                [
                    'name'=>'NotEmpty',
                    'options'=>[
                        'messages'=>[
                            NotEmpty::IS_EMPTY=>"Vui lòng chọn file"
                        ]
                    ]
                ]
            ]
        ]);
    }
}