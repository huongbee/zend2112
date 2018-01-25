<?php

namespace Started\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController{
    
    function indexAction(){
        $checkMethod = $this->getRequest();
        // if($checkMethod->isGet()){
        //     echo "Using method GET";
        // }
        // else{
        //     echo "Not GET";
        // }
        if($checkMethod->isPost()){
            echo $this->params()->fromPost('name','Huong');
            echo "<br>";
            echo "Using method POST";
        }
        else{
            //echo $_GET['name'];
            echo $this->params()->fromRoute('name','Huong');
            echo "<br>";
            echo $this->params()->fromRoute('action','index01');
            echo "<br>";
            echo $this->params()->fromRoute('id',0);
            echo "<br>";
            echo "Not POST";
        }

        echo "<br>";
        echo "indexAction of AdminController";
        return false;
    }

    function loginAction(){
        echo $this->params()->fromRoute('action','index01');
        echo "<br>";
        echo "Login page";
        return false;
    }
    function editAction(){
        //http://localhost/zend2112/public/started/huong/edit

        $checkMethod = $this->getRequest();
        $uri = $checkMethod->getUriString();
        $method = $checkMethod->getMethod();

        //module/controller/action
        
        // return new ViewModel([
        //     'uri'=>$uri,
        //     'method'=>$method
        // ]);

        $view = new ViewModel([
            'uri'=>$uri,
            'method'=>$method
        ]);
        $view->setTemplate('started/edit-admin');
        return $view;
    }


    
}


?>