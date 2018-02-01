<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\FormElement;
use Zend\Validator\StringLength;
use Zend\Validator\InArray;

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

}


?>