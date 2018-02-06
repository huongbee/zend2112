<?php
namespace Form\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Form\Form\Contact;

class ContactController extends AbstractActionController{

    function indexAction(){
        $form = new Contact;

        $request = $this->getRequest();
        if($request->isPost()){
            $data = $this->params()->fromPost();

            $form->setData($data);

            if($form->isValid()){
                $data = $form->getData();

                echo "<pre>";
                print_r($data );
                echo "</pre>";
             }
            // else{
            //     foreach($form->getMessages() as $err){
            //         echo $err;
            //         echo "<br>";
            //     }
            // }
        }
        return new ViewModel(['form'=>$form]);
    }
}


?>