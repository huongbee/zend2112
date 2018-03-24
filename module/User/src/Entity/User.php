<?php
namespace User\Entity;

class User{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $fullname;

    /**
     * @var date
     */
    protected $birthdate;
    /**
     * @var string
     */
    protected $gender;

    /**
     * @var string
     */
    protected $address;
    /**
     * @var string
     */
    protected $phone;

    /**
     * @var int
     */
    protected $role;
    /**
     * @var string
     */
    protected $token;

    /**
     * @var timestamp
     */
    protected $created_at;
    
}

?>