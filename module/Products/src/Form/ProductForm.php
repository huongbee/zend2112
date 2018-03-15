<?php
namespace Products\Form;
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


class ProductForm extends Form{

    function __construct(){
        parent::__construct();

        //type
        $this->add([
            'type'=>Select::class,
            'name'=>'id_type',
            'options'=>[
                'label'=>'Chọn loại: ',
                'label_attributes'=>[
                    'class'=>" control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control'
            ]
        ]);
        

        //name
        $this->add([
            'type'=>'Text',
            'name'=>'name',
            'options'=>[
                'label'=>'Tên sản phẩm: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập tên sản phẩm"
            ]
        ]);

        //summary
        $this->add([
            'type'=>'Textarea',
            'name'=>'summary',
            'options'=>[
                'label'=>'Mô tả ngắn: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'rows'=> 5
            ]
        ]);

        //detail
        $this->add([
            'type'=>'Textarea',
            'name'=>'detail',
            'options'=>[
                'label'=>'Mô tả đầy đủ: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control'
            ]
        ]);

        //price
        $this->add([
            'type'=>'Text',
            'name'=>'price',
            'options'=>[
                'label'=>'Đơn giá: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'value'=>0
            ]
        ]);

        //promotion_price
        $this->add([
            'type'=>'Text',
            'name'=>'promotion_price',
            'options'=>[
                'label'=>'Đơn giá khuyến mãi: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'value'=>0
            ]
        ]);

        //image
        $this->add([
            'type'=>'File',
            'name'=>'image',
            'options'=>[
                'label'=>'Chọn ảnh: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'multiple'=>true
            ]
        ]);
        //size
        $this->add([
            'type'=>'Text',
            'name'=>'size',
            'options'=>[
                'label'=>'Kích thước sản phẩm: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập kích thước sản phẩm (Cao-Dài-Rộng) "
            ]
        ]);
        //material
        $this->add([
            'type'=>'Text',
            'name'=>'material',
            'options'=>[
                'label'=>'Chất liệu sản phẩm: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập chất liệu sản phẩm "
            ]
        ]);
        //color
        $this->add([
            'type'=>'Text',
            'name'=>'color',
            'options'=>[
                'label'=>'Màu sắc sản phẩm: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'class'=>'form-control',
                'placeholder'=>"Nhập màu sắc sản phẩm "
            ]
        ]);
        //unit
        $this->add([
            'type'=>Select::class,
            'name'=>'unit',
            'options'=>[
                'label'=>'Đơn vị tính: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ],
                'value_options'=>[
                    'bộ'=>'Bộ',
                    'chiếc'=>'Chiếc',
                    'vnđ'=>'VNĐ'
                ],
            ],
            'attributes'=>[
                'class'=>'form-control'
            ]
        ]);

        //hot
        $this->add([
            'type'=>Checkbox::class,
            'name'=>'noibat',
            'options'=>[
                'label'=>'Nổi bật: ',
                'label_attributes'=>[
                    'class'=>"control-label col-sm-2"
                ]
            ],
            'attributes'=>[
                'value'=> 1,
                'required'=>false
            ]
        ]);

        //btn

        $this->add([
            'type'=>'Submit',
            'name'=>'btnSubmit',
            'attributes'=>[
                'class'=>'btn btn-primary',
                'value'=>'Add'
            ]
        ]);

        $this->filterForm();
    }

    function filterForm(){
        $filter = new InputFilter();
        $this->setInputFilter($filter);

        //name: required, min:5
        $filter->add([
            'name'=>'name',
            'required'=>true,
            'filters'=>[
                ['name'=>Filter\StripNewlines::class]
            ],
            'validators'=>[
                [
                    'name'=>"NotEmpty",
                    'options'=>[
                        'messages'=>[
                            NotEmpty::IS_EMPTY=>"Vui lòng nhập tên sp"
                        ],
                         'break_chain_on_failure'=>true,
                    ] 
                ],
                [
                    'name'=>'StringLength',
                    'options'=>[
                        'min'=>5,
                        'messages'=>[
                            StringLength::TOO_SHORT=>'Tên sản phẩm ít nhất %min% kí tự, chuỗi hiện tại %length% kí tự'
                        ],
                        'break_chain_on_failure'=>true
                    ]
                ]
            ]
        ]);

        //price
        $filter->add([
            'name'=>'price',
            'required'=>true,
            'filters'=>[
                ['name'=>Filter\StripNewlines::class]
            ],
            'validators'=>[
                [
                    'name'=>"NotEmpty",
                    'options'=>[
                        'messages'=>[
                            NotEmpty::IS_EMPTY=>"Vui lòng nhập đơn giá"
                        ],
                         'break_chain_on_failure'=>true,
                    ] 
                ],
                [
                    'name'=>'Digits',
                    'options'=>[
                        'messages'=>[
                            Digits::NOT_DIGITS=>'Vui lòng chỉ nhập số từ 0-9',
                            Digits::STRING_EMPTY=>'Vui lòng nhập đơn giá',
                            Digits::INVALID=>'Dữ liệu bạn nhập ko hợp lệ'
                        ],
                        'break_chain_on_failure'=>true
                    ]
                ]
            ]
        ]);

        //image

    }
}


?>