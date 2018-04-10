<?php
namespace User\Service;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Zend\Authentication\Adapter\Exception\ExceptionInterface;
use User\Entity\User;
use Zend\Crypt\Password\Bcrypt;


class AuthAdapter implements AdapterInterface{
    
    
    private $entityManager;
    private $email = null;
    private $password = null;

    
    function __construct($entityManager){
        $this->entityManager = $entityManager;
    }

    function setEmail($email){
        $this->email = $email;
    }
    function setPassword($password){
        $this->password = $password;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface
     *     If authentication cannot be performed
     */
    public function authenticate(){
        $user = $this->entityManager->getRepository(User::class)->findOneByEmail($this->email);
        if(!$user){
            return new Result(
                Result::FAILURE_IDENTITY_NOT_FOUND,
                null,
                ['Không tìm thấy user, bạn vui lòng kiểm tra lại']
            );
        }
        $bcrypt = new Bcrypt;
        $securePass = $user->getPassword(); //pw trong db
        $password = $this->password;  // pw nguoi dung truyen vao
        if ($bcrypt->verify($password, $securePass)) {
            return new Result(
                Result::SUCCESS,
                $user->getEmail(),
                ['Login thành công']
            );
        }
        else{
            return new Result(
                Result::FAILURE_CREDENTIAL_INVALID,
                null,
                ['Mật khẩu không chính xác']
            );
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