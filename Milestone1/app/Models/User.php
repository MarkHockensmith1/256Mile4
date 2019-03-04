<?php
namespace App\Models;

/**
 * 
 * @author Anthony N. and Mark H.
 *
 */
class User
{
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $admin;
    
    
    /**
     * @return mixed
     */
    
    
    public function __construct($fn,$ln,$un,$pw,$ad){
        $this->firstname=$fn;
        $this->lastname=$ln;
        $this->username=$un;
        $this->password=$pw;
        $this->admin=$ad;
        
    }
    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }
    
    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }
    
    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    
    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    
    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    
}