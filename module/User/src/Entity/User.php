<?php
namespace User\Entity;

use Doctrine\ORM\Mapping\ClassMetadata;
/**
 * @Entity
 * @Table(name="users")
 */

class User{

    /** 
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    
    /** @Column(type="string",unique=TRUE) */
    protected $email;

    /** @Column(type="string") */
    protected $password;
    
    /** @Column(type="string") */
    protected $fullname;

    
    /** @Column(type="date") */
    protected $birthdate;
    
    /** @Column(type="string") */    
    protected $gender;

    /** @Column(type="tring") */
    protected $address;
    
    /** @Column(type="string") */    
    protected $phone;

    /** @Column(type="boolean") */
    protected $role;
    
    /** @Column(type="string") */
    protected $token;

    /** @Column(type="datetime",name="created_at") */
    protected $createdAt;


    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setPassword($pw){
        $this->password = $pw;
    }
    public function getPassword(){
        return $this->password;
    }
    
    public function setFullname($fullname){
        $this->fullname = $fullname;
    }
    public function getFullname(){
        return $this->fullname;
    }

    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }
    public function getBirthdate(){
        return $this->birthdate;
    }
    
    public function setGender($gender){
        $this->gender = $gender;
    }
    public function getGender(){
        return $this->gender;
    }
    
    public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getPhone(){
        return $this->phone;
    }
    
    public function setRole($role){
        $this->role = $role;
    }
    public function getRole(){
        return $this->role;
    }
    public function setToken($token){
        $this->token = $token;
    }
    public function getToken(){
        return $this->token;
    }
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    
}

?>