<?php
namespace User\Service;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Result;


class AuthManager{

    public $authenticationService;
    public $sessionManager;
    private $config;

    function __construct($authenticationService, $sessionManager,$config){
        $this->authenticationService = $authenticationService;
        $this->sessionManager = $sessionManager;
        $this->config = $config;
    }

    function login($email,$password){
        if($this->authenticationService->hasIdentity()){
            return -1; //da dang nhap
            //throw new \Exception('Bạn đã đăng nhập');
            
        }
        $authAdapter = $this->authenticationService->getAdapter();
        $authAdapter->setEmail($email);
        $authAdapter->setPassword($password);

        $result = $this->authenticationService->authenticate();
        
        if($result->getCode() === Result::SUCCESS){
            //luu tru session   
            $this->sessionManager->rememberMe(86400*2); //2days
            //return $this->sessionManager;
        }
        return $result;

    }

    function logout(){
        if($this->authenticationService->hasIdentity()){
            $this->authenticationService->clearIdentity();
        }
        else{
            throw new \Exception('Bạn chưa đăng nhập');
        }
    }

    function filterAccess($controllerName,$actionName){

        if(isset($this->config['controllers'][$controllerName])){
            $controllers = $this->config['controllers'][$controllerName];
            foreach($controllers as $c){
                $arrAction = $c['actions'];
                $allow = $c['allow'];
                if(in_array($controllerName,$arrAction)){
                    if($allow == "all"){
                        return true;
                    }
                    else return false;
                }
            }
        }
        return true;
    }
}

?>