<?php
namespace Form\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter; 
use Zend\Filter; 
//use Zend\Validator\NotEmpty;
use Zend\Validator\File\UploadFile as FileUpload;
use Zend\Validator\File\FilesSize;

class UploadFile extends Form{

    function __construct(){
        parent::__construct();

        $this->add([
            'type'=>'file',
            'name'=>'file-upload',
            'options'=>[
                'label'=>"Choose File:"
            ],
            'attributes'=>[
                'required'=>true,
                'multiple'=>true
            ]
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

        $size = new FilesSize(['min'=>100, 'max'=>102400]);//100bytes->10kb
        $size->setMessages([
            FilesSize::TOO_BIG => 'File bạn chọn quá lớn (%size%), yêu cầu <= %max%',
            FilesSize::TOO_SMALL=>'File bạn chọn quá bé  (%size%), yêu cầu >= %min%',
            FilesSize::NOT_READABLE => "File bạn chọn không thể đọc"
        ]);

        $mimeType  = new \Zend\Validator\File\MimeType('image/gif, image/png, image/jpeg');
        $mimeType->setMessages([
             \Zend\Validator\File\MimeType::FALSE_TYPE => 'Mimetype (%type%) không được phép. Chỉ cho phép chọn file hình'
        ]);

        // File Input
        $fileInput = new \Zend\InputFilter\FileInput('file-upload');
        $fileInput->setRequired(true);

        $fileInput->getValidatorChain()
                    ->attach($fileUpload,true,3)
                    ->attach($size,true,2)
                    ->attach($mimeType,true,1);
        
        $filter = new InputFilter();
        
        $filter->add($fileInput);
        $this->setInputFilter($filter);



            //check file size (<=1Mb), 
            //MimeType (image/png, image/jpeg), 
            //imagesize  w X h

            //Rename file ;

            //Upload Multiple file
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
                ],
                [ 

                ]
            ]
            

        ]);
        */
    }
}