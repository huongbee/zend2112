<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as Mapping;
/**
 * @Mapping\Entity
 * @Mapping\Table(name="users")
 */

class User{

    function __construct(){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
        
    }
    /** 
     * @Mapping\Id
     * @Mapping\Column(type="integer")
     * @Mapping\GeneratedValue
     */
    protected $id;
    
    /** @Mapping\Column(type="string",unique=TRUE) */
    protected $email;

    /** @Mapping\Column(type="string") */
    protected $password;
    
    /** @Mapping\Column(type="string") */
    protected $fullname;

    
    /** @Mapping\Column(type="date") */
    protected $birthdate;
    
    /** @Mapping\Column(type="string") */    
    protected $gender;

    /** @Mapping\Column(type="string") */
    protected $address;
    
    /** @Mapping\Column(type="string") */    
    protected $phone;

    /** @Mapping\Column(type="boolean") */
    protected $role;
    
    /** @Mapping\Column(type="string") */
    protected $token;

    /** @Mapping\Column(type="datetime",name="token_date") */
    protected $tokenDate;


    /** @Mapping\Column(type="datetime",name="created_at") */
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

    public function setTokenDate($tokenDate){
        $this->tokenDate = $tokenDate;
    }
    public function getTokenDate(){
        return $this->tokenDate;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    
}

?>