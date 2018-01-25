<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\FormElement;

class IndexController extends AbstractActionController{
    function indexAction(){
        $form = new FormElement;

        $view = new ViewModel(['forms'=>$form]);
        $view->setTemplate('form/element/index');
        return $view;
    }
}


?>