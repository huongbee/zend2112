<?php
namespace User\Service;
use User\Entity\User;
use Zend\Crypt\Password\Bcrypt;

class UserManager {

    private $entityManager;
    
    function __construct($entityManager){
        $this->entityManager = $entityManager;
    }
    function insertUser($data = []){
        $user = new User;
        $user->setEmail($data['email']);
        $user->setFullname($data['fullname']);

        $birthdate = new \DateTime($data['birthdate']);
        $birthdate->format('Y-m-d');
        $user->setBirthdate($birthdate);

        $user->setGender($data['gender']);
        $user->setAddress($data['address']);
        $user->setPhone($data['phone']);
        $user->setRole(0);

        //pw
        $bcrypt = new Bcrypt();
        $securePass = $bcrypt->create($data['password']);
        $user->setPassword($securePass);
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}


?>