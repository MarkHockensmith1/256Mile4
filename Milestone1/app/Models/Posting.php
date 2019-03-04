<?php
namespace App\Models\Models;

class Posting
{
    private $jobPosting;
    
    public function __construct($jobInfo){
        $this->jobPosting=$jobInfo;
    }
    
    /**
     * @return mixed
     */
    public function getJobPosting()
    {
        return $this->jobPosting;
    }

    /**
     * @param mixed $jobPosting
     */
    public function setJobPosting($jobPosting)
    {
        $this->jobPosting = $jobPosting;
    }

    
}

