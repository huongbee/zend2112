<?php

namespace Started\Controller;

use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController{
    
    function indexAction(){
        echo "indexAction";
        echo "<br>";
        echo "Hello Index";
        return false;
    }
    function editAction(){
        echo "editAction";
        echo "1234567";
        return false;
    }

    function deleteAction(){
        echo 2345345;
        echo "deleteAction....";
        echo "1234567";
        return false;
    }
    function delete02Action(){
        echo "deleteAction....";
        echo "1234567";
        return false;
    }
    

    
}


?>