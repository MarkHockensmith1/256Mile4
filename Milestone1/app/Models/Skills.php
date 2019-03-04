<?php 
namespace App\Models;

/**
 * 
 * @author Mark H.
 *
 */
class Skills
{
    private $skills;
    private $skillsUserId;

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return mixed
     */
    public function getSkillsUserId()
    {
        return $this->skillsUserId;
    }

    /**
     * @param mixed $skillsUserId
     */
    public function setSkillsUserId($skillsUserId)
    {
        $this->skillsUserId = $skillsUserId;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function __construct($skills, $skillsUserId){
        $this->skills = $skills;
        $this->skillsUserId = $skillsUserId;
    }
    
    
}
?>