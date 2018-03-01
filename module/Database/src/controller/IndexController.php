<?php
namespace Database\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{

    function indexAction(){
        echo "Hello";
        return false;
    }
}

?>