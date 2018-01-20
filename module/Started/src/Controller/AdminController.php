<?php

namespace Started\Controller;

use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController{
    
    function indexAction(){
        echo "indexAction of AdminController";
        return false;
    }

    function loginAction(){
        echo "Login page";
        return false;
    }
}


?>