<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    function indexAction(){
        $view = new ViewModel();
        $view->setTemplate('form/element/index');
        return $view;
    }
}


?>