<?php
namespace User\Service;

class UserManager {

    private $entityManager;
    
    function __construct($entityManager){
        $this->entityManager = $entityManager;
    }
}


?>