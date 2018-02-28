<?php
namespace Form\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Filter; 
use Zend\Validator\NotEmpty;
use Zend\Validator\File\UploadFile as FileUpload;

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
        
        $fileUpload = new FileUpload();
        $fileUpload->setMessages([
            FileUpload::NO_FILE => 'Vui lòng chọn file'
        ]);

        // File Input
        $fileInput = new \Zend\InputFilter\FileInput('file-upload');
        $fileInput->setRequired(true);
        $fileInput->getValidatorChain()
                    ->attach($fileUpload,true);
        
        $filter = new InputFilter();
        
        $filter->add($fileInput);
        $this->setInputFilter($filter);


        /*
        $filter->add([
            'name'=>'file-upload',
            'required'=>true,
            'validators'=>[
                [
                    'name'=>'NotEmpty',
                    'options'=>[
                        'messages'=>[
                            NotEmpty::IS_EMPTY => "Vui lòng chọn file"
                        ]
                    ],
                    'break_chain_on_failure'=>true
                ]
            ]
            //check file size (<=1Mb), 
            //MimeType (image/png, image/jpeg), 
            //Rename file ;
            //Upload Multiple file

        ]);
        */
    }
}