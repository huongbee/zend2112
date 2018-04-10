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
        
        return new ViewModel(['form'=>$form]);
    }
}