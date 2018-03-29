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

    function checkEmailExists($email,$id = 0){
        if($id==0) {
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($email);
            
        }
        else  {
            //echo $id;
            $user = $this->entityManager
                    ->createQuery("SELECT u FROM User\Entity\User u WHERE u.id <> $id AND u.email = '$email'")
                    ->getResult();
        }
        return empty($user) ? true : false;
    }
    function findUserByid($id){
        $user = $this->entityManager->getRepository(User::class)->find($id);
        return $user!==null ? $user : false;
    }

    function updateUser($user, $data = []){
        $user->setEmail($data['email']);
        $user->setFullname($data['fullname']);

        $birthdate = new \DateTime($data['birthdate']);
        $birthdate->format('Y-m-d');
        $user->setBirthdate($birthdate);

        $user->setGender($data['gender']);
        $user->setAddress($data['address']);
        $user->setPhone($data['phone']);
        $user->setRole(0);

        $this->entityManager->flush();
        return $user;
    }
}


?>