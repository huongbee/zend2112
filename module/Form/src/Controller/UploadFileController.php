<?php

namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\UploadFile;
use Zend\File\Transfer\Adapter\Http;
use Zend\Filter\File\Rename;


class UploadFileController extends AbstractActionController{

    function indexAction(){
        $form = new UploadFile;

        $request = $this->getRequest();

        if($request->isPost()){
            $input = $this->params()->fromPost();
            
            $file = $request->getFiles()->toArray();

            $data = array_merge($input,$file);
            
            $form->setData($data);

            if($form->isValid()){

                // echo "<pre>";
                // print_r($file);
                // echo "</pre>";
                // $upload = new Http();

                // // $fileInfor = $upload->getFileInfo();
                // // echo $nameFile = $upload->getFileName();
                // // echo $fileSize = $upload->getFileSize();
                
                // $upload->setDestination(FILE_PATH.'upload/');
                // $upload->receive();

                // if($upload->isUploaded()){
                //     echo "uploaded";
                // }
                // else{
                //     echo "upload errors..";
                // }

                $rename = new Rename([
                    'target'=>FILE_PATH.'upload/'.$data['file-upload']['name'],
                    'randomize'=>true,
                    'overwrite'=>true
                ]);
                $result = $rename->filter($data['file-upload']);
                print_r($result);
            }
            
        }

        $view =  new ViewModel(['form'=>$form]);
        $view->setTemplate('form/uploadfile/index');
        return $view;
    }

    function index02Action(){
        $form = new UploadFile;

        $request = $this->getRequest();

        if($request->isPost()){
            
            $file = $request->getFiles()->toArray();

            // echo "<pre>";
            // print_r($file);
            // echo "</pre>";
            // die;
            $form->setData($file);

            if($form->isValid()){
                foreach($file['file-upload'] as $f){
                    $rename = new Rename([
                        'target'=>FILE_PATH.'upload/'.$f['name'],
                        'randomize'=>true,
                        'overwrite'=>true
                    ]);
                    $result = $rename->filter($f);
                    //print_r($result);
                }
                echo "Upload successfully";
            }
            
        }

        $view =  new ViewModel(['form'=>$form]);
        $view->setTemplate('form/uploadfile/index');
        return $view;
    }
}


?>