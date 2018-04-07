<?php
namespace User\Service;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Result;


class AuthManager{

    public $authenticationService;
    public $sessionManager;

    function __construct($authenticationService, $sessionManager){
        $this->authenticationService = $authenticationService;
        $this->sessionManager = $sessionManager;
    }

    function login($email,$password){
        if($this->authenticationService->hasIdentity()){
            //return -1; //da dang nhap
            throw new \Exception('Bạn đã đăng nhập');
        }
        $authAdapter = $this->authenticationService->getAdapter();
        $authAdapter->setEmail($email);
        $authAdapter->setPassword($password);
        $result = $authAdapter->authenticate();
        if($result->getCode() === Result::SUCCESS){
            //luu tru session   
            $this->sessionManager->rememberMe(86400*2); //2days
        }
        return $result;

    }
}

?>