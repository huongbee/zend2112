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

        $hidden = new Element\Hidden('token');
        $hidden->setAttributes([
            'value'=>"234567dfdf"
        ]);
        $this->add($hidden);

        $reset = new Element\Button('refresh');
        $reset->setLabel('Reset');
        $reset->setAttributes([
            'class'=>'btn btn-success',
            'type'=> "reset"
        ]);
        $this->add($reset);

        $submit = new Element\Submit('btnSubmit');
        $submit->setValue('Save');
        $submit->setAttributes([
            'class'=>'btn btn-primary',
        ]);
        $this->add($submit);

    
        $this->add([
            'type'=>Element\Csrf::class,
            'name' => 'csrf',
            'options' => [
                'csrf_options' => [
                    'timeout' => 60, //1p
                ],
            ],
        ]);

        $this->add([
            'type'=>'Select',
            'name'=>'subject',
            'options'=>[
                'value_options'=>[
                    'php'=>'PHP',
                    'html'=>'HTML',
                    'js'=>'Javascript'
                ],
                'label'=>"Choose Subject",
                'label_options'=>[
                    'class'=>'control-label'
                ]
            ],
            'attributes'=>[
                'value'=>['html','js'],
                'class'=>'form-control',
                'multiple'=>true
            ]
        ]);

        $this->add([
            'type'=>"Checkbox",
            'name'=>'sport',
            'options'=>[
                'value_options'=>[
                    'checked_value'=>'1',
                    'unchecked_value'=>'0'
                ],
                'label'=>"Choose Sport",
                'label_options'=>[
                    'class'=>'control-label'
                ]
            ]
        ]);
        $this->add([
            'type'=>"Checkbox",
            'name'=>'sport_2',
            'options'=>[
                'value_options'=>[
                    'checked_value'=>'1',
                    'unchecked_value'=>'0'
                ],
                'label'=>"Choose Sport",
                'label_options'=>[
                    'class'=>'control-label'
                ]
            ]
        ]);

        $this->add([
            'type'=>"Radio",
            'name'=>'gender',
            'options'=>[
                'value_options'=>[
                    'male'=>'Male',
                    'female'=>'Female'
                ],
                'label'=>"Gender",
                'label_options'=>[
                    'class'=>'control-label'
                ]
            ],
            'attributes'=>[
                'style'=>'margin-left:20px',
                'value'=>'female'
            ]
        ]);

        $this->add([
            'type'=>"MultiCheckbox",
            'name'=>'favorite',
            'options'=>[
                'label'=>"Favorite: ",
                'label_options'=>[
                    'class'=>'control-label'
                ],
                'value_options'=>[
                    [
                        'value'=>'music',
                        'label'=>'Music',
                        'selected'=>true
                    ],
                    [
                        'value'=>'commic',
                        'label'=>'Commic'
                    ],
                    [
                        'value'=>'sport',
                        'label'=>'Sport'
                    ],
                    [
                        'value'=>'sing',
                        'label'=>'Sing'
                    ]
                ]
            ],
            'attributes'=>[
                'style'=>'margin-left:20px'
            ]
        ]);

        // $this->add([
        //     'type' => 'Zend\Form\Element\Captcha',
        //     'name' => 'captcha',
        //     'options' => [
        //         'label' => 'Please verify you are human',
        //         'captcha' => new Captcha\Dumb(),
        //     ],
        // ]);

        $this->add([
            'type'=>'Captcha',
            'name'=>'captcha',
            'options'=>[
                'captcha'=>[
                    'class'=>'Image',
                    'imgDir'=>'public/img/captcha/',
                    'imgUrl' => '../img/captcha/',
                    'suffix'=>'.png',
                    'dotNoiseLevel'=>100,
                    'lineNoiseLevel'=>3,
                    'height' => 200,
                    'width'=>400,
                    'wordLen'=>7,
                    'fsize'=>50, //font size
                    'font'=>'public/fonts/Permanent_Marker/PermanentMarker-Regular.ttf',
                    'expiration' => 100,
                    ],
                'label'=>'Human check: ',
            ]
        ]);
        $this->add([
            'type'=>'File',
            'name'=>'avatar',
            'options'=>[
                'label'=>'Choose Avatar',
                'label_options'=>[
                    'class'=>'control-label'
                ]
            ]
        ]);




        


    }
}


?>