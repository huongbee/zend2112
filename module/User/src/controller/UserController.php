<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController{

    private $entityManager, $userManager ;
    function __construct($entityManager, $userManager ){
        $this->entityManager = $entityManager;
        $this->userManager = $userManager;
    }
    
    function indexAction(){
        echo "124";
        return false;
    }
}
?>