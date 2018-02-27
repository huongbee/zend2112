<?php

namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\UploadFile;

class UploadFileController extends AbstractActionController{

    function indexAction(){
        $form = new UploadFile;

        $request = $this->getRequest();
        
        if($request->isPost()){
            $file = $request->getFiles();
            echo "<pre>";
            print_r($file);
            echo "</pre>";
        }

        $view =  new ViewModel(['form'=>$form]);
        $view->setTemplate('form/uploadfile/index');
        return $view;
    }
}


?>