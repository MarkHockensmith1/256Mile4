<?php
namespace App\Services\Data;

use App\Models\Models\Posting;

class JobPostingDataService
{
    private $conn;
    
    /**
     *
     * @param
     *            $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    
    public function createJobPosting(Posting $jobPosting){
        $jPosting = $jobPosting->getJobPosting();
        
        $sth = $this->conn->prepare('INSERT INTO jobpostings(POSTING_ID,JOB_INFO) VALUES(1,:job');
        $sth->biindParam('job', $jPosting);
        
        $result = $sth->excute();
        return $result;
    }
    public function findJobPostings(){
        
    }
    public function findPostingId(Posting $jobPosting){
        
        $sth = $this->conn->prepare('SELECT POSTING_ID FROM jobpostings WHERE JOB_POSTING_INFO =:job');
        $sth->bindParam('job', $jobPosting);
        
        $result = $sth->excute();
        return $result;
        
    }
    public function updateJobPosting(Posting $jobPosting, $id){
        
        $jPosting = $jobPosting->getJobPosting();
        
        $sth = $this->conn->prepare('UPDATE clc.jobpostings SET JOB_POSTING_INFO =:job WHERE POSTING_ID =:id');
        $sth->bindParam('job', $jPosting);
        $sth->bindParam('id',$id);
        
        $result = $sth->excute();
        return $result;
    }
    
}

