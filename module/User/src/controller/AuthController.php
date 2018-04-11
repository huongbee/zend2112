<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use User\Entity\User;
use Zend\View\Model\ViewModel;
use User\Form\UserForm;
use User\Form\ResetPasswordForm;
use User\Form\ForgetPasswordForm;
use Zend\View\Model\JsonModel;
use User\Form\LoginForm;
use Zend\Authentication\Result;


class AuthController extends AbstractActionController{

    private $entityManager,$userManager,$authManager,$authService;

    function __construct($entityManager, $userManager, $authManager, $authService){
        $this->entityManager = $entityManager;
        $this->userManager = $userManager;
        $this->authManager = $authManager;
        $this->authService = $authService;
        
    }
    function loginAction(){
        $form = new LoginForm();
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $this->params()->fromPost();
            $form->setData($data);
            if($form->isValid()){
                $data = $form->getData();

                $result = $this->authManager->login($data['email'],$data['password']);

                // echo "<pre>";
                // print_r($result);
                // echo "</pre>"; 
                // return false;

                $message = current($result->getMessages());
                if($result->getCode() == Result::SUCCESS){
                    $this->flashMessenger()->addSuccessMessage($message);
                    return $this->redirect()->toRoute('user',[
                        'controller'=>'user',
                        'action'=>'index'
                    ]);  
                }
                
                $this->flashMessenger()->addErrorMessage($message);
                return $this->redirect()->toRoute('login',[
                    'controller'=>'auth',
                    'action'=>'login'
                ]);  
            }
        }
        return new ViewModel(['form'=>$form]);
    }
    function logoutAction(){
        $this->authManager->logout();
        return $this->redirect()->toRoute('login',[
            'controller'=>'auth',
            'action'=>'login'
        ]);  
    }
}