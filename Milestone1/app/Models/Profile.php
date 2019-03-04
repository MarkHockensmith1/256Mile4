<?php
namespace App\Models;
/**
 * 
 * @author Anthony Natividad
 *
 */
class Profile
{

    private $description;

    private $status;

    private $title;

    private $skills;

    private $email;

    private $phoneNo;

    /**
     * Constructor method
     * @return mixed
     */
    public function __construct($title, $description, $status, $skills, $email, $phoneNo)
    {
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->skills = $skills;
        $this->email = $email;
        $this->phoneNo = $phoneNo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return mixed
     */
    public function getPhoneNo()
    {
        return $this->phoneNo;
    }

    /**
     *
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     *
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     *
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     *
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @param mixed $phoneNo
     */
    public function setPhoneNo($phoneNo)
    {
        $this->phoneNo = $phoneNo;
    }
}