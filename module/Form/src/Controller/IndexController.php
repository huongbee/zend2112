<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\FormElement;

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

}


?>