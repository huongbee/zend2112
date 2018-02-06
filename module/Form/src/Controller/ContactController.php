<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\Contact;

class ContactController extends AbstractActionController{

    function indexAction(){
        $form = new Contact;
        
        return new ViewModel(['form'=>$form]);
    }
}


?>