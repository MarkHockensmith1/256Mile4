<?php 

namespace App\Models;

/**
 * 
 * @author Mark H.
 *
 */
class Education
{
    private $education;
    private $educationUserId;

    /**
     * @return mixed
     */
    public function getEducationUserId()
    {
        return $this->educationUserId;
    }

    /**
     * @param mixed $userId
     */
    public function setEducationUserId($educationUserId)
    {
        $this->educationUserId = $educationUserId;
    }

    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @param mixed $education
     */
    public function setEducation($education)
    {
        $this->education = $education;
    }

    public function __construct($education, $userId){
        $this->education = $education;
        $this->educationUserId = $userId;
    }
    /**
     * @return mixed
     */
   

}

?>