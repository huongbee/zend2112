<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\FormElement;
use Zend\Validator\StringLength;
use Zend\Validator\InArray;
//use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;
use Zend\Validator\ValidatorChain;
use  Zend\Validator\Regex;


class IndexController extends AbstractActionController{
    
    function indexAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $this->params()->fromPost();
            $file = $request->getFiles()->toArray();
            echo "<pre>";
            print_r($data);
            print_r($file);
            echo "</pre>";
        }
        $form = new FormElement;
        $view = new ViewModel(['forms'=>$form]);
        $view->setTemplate('form/element/index');
        return $view;
    }

    function validatorAction(){
        $form = new FormElement;
        //fullname 5-20 words
        $request = $this->getRequest();
        if($request->isPost()){
            $dataInput = $this->params()->fromPost();
            $fullname = $dataInput['fullname'];
            $subject = $dataInput['subject'];

            $validatorFullname = new StringLength([
                'min'=>5,
                'max'=>20
            ]);
            //$form->setData($dataInput);
            if($validatorFullname->isValid($fullname)){
                //valid
                echo "Valid Fullname!";
                echo "<br>";
                echo $fullname;
                echo "<br>String legnth: ";
                echo $length = $validatorFullname->getStringLength();
            }
            else{ //invalid
                $messages = $validatorFullname->getMessages();
                foreach($messages as $error){
                    echo $error.'<br>';
                }
            }
            
            $validatorSubject = new InArray([
                'haystack'=>['php', 'js','html']
            ]);

            foreach($subject as $monhoc){
                if($validatorSubject->isValid($monhoc)){
                    //valid
                    echo "<hr>";
                    echo "Valid Subject!";
                    echo "<br>";
                    echo($monhoc);
                    echo "<br>";
                }
                else{ //invalid
                    $messages = $validatorSubject->getMessages();
                    foreach($messages as $error){
                        echo $error.'<br>';
                    }
                }
            }
        }
        
        $view = new ViewModel(['forms'=>$form]);
        $view->setTemplate('form/element/validator');
        return $view;
    }

    function validator02Action(){
        //email
        // $validator = new \Zend\Validator\EmailAddress();
        // $email = "huong@gmail.com";//true
        // $email = "huonggmail.com";

        // $validator = new NotEmpty();
        // $validator = new NotEmpty(NotEmpty::INTEGER);
        // $data = 0;

        // $validator = new \Zend\Validator\InArray([
        //     'haystack'=>[
        //         ['value1', 'value2', 233, 1, false],
        //         [1,2,3,4,5]
        //     ],
        //     'recursive'=>true,
        //     'strict'=>true //ca datatype
        // ]);
        // //$data = ['value1', 'value2', 233, 0, false]; //true
        // $data = 0; 

        // $validator = new \Zend\Validator\File\Count([
        //     'min'=>2,
        //     'max'=>4
        // ]);
        // $data = [
        //     __DIR__.'/img/images/test.txt',              __DIR__.'/img/images/logohome.png',
        //     __DIR__.'/img/images/test.txt',
        // ];

        $validator = new \Zend\Validator\File\Exists();
        $data = FILE_PATH.'images/hinhlogo.png';

        if($validator->isValid($data)){
            echo "Tồn tại file";
            echo "<hr>";
            //cho phep file png, jpg
            $extCheck = new \Zend\Validator\File\Extension([
                'extension'=>'PNG, jpg',
                'case'=>false
            ]);
            $extCheck->setMessages([
                $extCheck::FALSE_EXTENSION => "File không được phép chọn",
                \Zend\Validator\File\Extension::NOT_FOUND => "Không tìm thấy extension"
            ]);

            if($extCheck->isValid($data)){
                echo "File được phép chọn";
                echo "<hr>";
                
                // size
                $sizeCheck = new \Zend\Validator\File\Size([
                    'min'=>1024,
                    'max'=>10240 //10kb
                ]);
                if($sizeCheck->isValid($data)){
                    echo "File size thoả mãn. Được phép upload";
                }
                else{
                    foreach($sizeCheck->getMessages() as $err){
                        echo $err;
                        echo "<br>";
                    }
                }
                echo "<hr>";
                //kích thước 
                $imgSize = new \Zend\Validator\File\ImageSize([
                    'minwidth' => 140,
                    'maxwidth' => 150,
                    'minheight' => 50,
                    'maxheight' => 100,
                ]);
                $imgSize->setMessages([
                    $imgSize::WIDTH_TOO_BIG=>'Chiều rộng %width% vượt quá giới hạn cho phép là %maxwidth%',
                    $imgSize::HEIGHT_TOO_BIG=>'Chiều cao %height% vượt quá giới hạn cho phép là %maxheight%'
                ]);
                if($imgSize->isValid($data)){          
                    echo "kích thước file thoả mãn. Được phép upload";
                }
                else{
                    

                    foreach($imgSize->getMessages() as $err){
                        echo $err;
                        echo "<br>";
                    }
                }


            }
            else{
                foreach($extCheck->getMessages() as $err){
                    echo $err;
                    echo "<br>";
                }
            }
        }
        else{
            foreach($validator->getMessages() as $err){
                echo $err;
                echo "<br>";
            }
        }
        return false;
    }

    function validator03Action(){
        //pw : min:6 , phai chua cac ki tu dac biet nhu: @#$%!*
        $validatorChain = new ValidatorChain();
        $validatorChain->attach(new StringLength(['min'=>6]));
        $validatorChain->attach(new Regex(
            ['pattern'=>'/[@#$%!*]+/']
        ) );
        $password = "sdsd23232";
        if($validatorChain->isValid($password)){
            echo "Pw thoả mãn";
        }
        else{
            foreach($validatorChain->getMessages() as $err){
                echo $err;
                echo "<br>";
            }
        }
        return false;
    }

}


?>