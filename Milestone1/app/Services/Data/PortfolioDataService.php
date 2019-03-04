<?php
namespace App\Services\Data;

use PDO;
use PDOException;
use App\Models\Skills;
use App\Models\History;
use App\Models\Education;
use Illuminate\Support\Facades\Log;

/**
 *
 * @author Mark H.
 *        
 */
class PortfolioDataService
{

    private $conn;

    /**
     * constructor to set connection
     * @param
     * $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    
  
    
    
    
    public function updateSkill(Skills $skill)
    {
        // Get Data
        $skillInfo = $skill->getSkill();
        
        // Prepare Statement
        $sth = $this->conn->prepare('UPDATE clc.skills(USER_ID,SKILLS_INFO) VALUES(1,:skill');
        $sth->biindParam('skill', $skillInfo);
        
        // Execute Statement
        $result = $sth->execute();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function updateHistory(History $history)
    {
        // Get Data
        $HistoryInfo = $history->getHistory();
        
        // Prepare Statement
        $sth = $this->conn->prepare('UPDATE history(USER_ID,HISTORYINFO) VALUES(1,:history');
        $sth->biindParam('history', $HistoryInfo);
        
        // Execute Statement
        $result = $sth->execute();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function updateEducation(Education $education)
    {
        // Get Data
        $educationInfo = $education->getEducation();
        
        // Prepare Statement
        $sth = $this->conn->prepare('UPDATE education(USER_ID,EDUCATIONINFO) VALUES(1,:education');
        $sth->biindParam('education', $educationInfo);
        
        // Execute Statement
        $result = $sth->execute();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    
    public function createSkills(Skills $skill)
    {
        
        
     
        $sth = $this->conn->prepare("INSERT INTO userskills(SKILLINFO) VALUES(:skills)");
        $sk = $skill->getSkills();
        $sth->bindParam(':skills', $sk);
        $sth->execute();
        if ($sth->rowCount() == 1) //check if database was updated
        {
            return true;
        } else {
            return false;
        }
        
        
    }
    
    public function createHistory(History $his)
    {
        $sth = $this->conn->prepare("INSERT INTO userhistory(HISTORYINFO) VALUES(:history)");
        $hs = $his->getHistory();
        $sth->bindParam(':history', $hs);
        $sth->execute();
        if ($sth->rowCount() == 1) //check if database was updated
        {
            return true;
        } else {
            return false;
        }
    }
    
    public function createEducation(Education $edu)
    {
        $sth = $this->conn->prepare("INSERT INTO usereducation(EDUCATIONINFO) VALUES(:education)");
        $ed = $edu->getEducation();
        $sth->bindParam(':education', $ed);
        $sth->execute();
        if ($sth->rowCount() == 1) //check if database was updated
        {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function findAllSkills()
    {
        $query = $this->conn->prepare("SELECT * FROM userskills");
        $query->execute();
        
        $allSkills = NULL;
        $i = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $allSkills[$i] = new Skills($row['SKILLINFO'],['SKILL_USER_ID']);
            $i++;
        }
        
        return $allSkills;

    }
    
    public function findAllHistory()
    {
        $query = $this->conn->prepare("SELECT * FROM userhistory");
        $query->execute();
        
        $allHistory = NULL;
        $i = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $allHistory[$i] = new History($row['HISTORYINFO'], ['HISTORY_USER_ID']);
            $i++;
        }
        
        return $allHistory;
    }
    
    public function findAllEducation()
    {
        $query = $this->conn->prepare("SELECT * FROM usereducation");
        $query->execute();
        
        $allEducation = NULL;
        $i = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $allEducation[$i] = new Education($row['EDUCATIONINFO'], ['EDUCATION_USER_ID']);
            $i++;
        }
        
        return $allEducation;
    }
    
    /**
     * deletes skill from database
     * @param Skills $skill
     * @return boolean returns whether operation was successful
     */
    public function deleteSkill(Skills $skill)
    {
        // Prepare Statement
        $sth = $this->conn->prepare('DELETE FROM userskills WHERE SKILLINFO = skill');
        $sth->biindParam('skill', $skill);
        
        // Execute Statement
        $result = $sth->execute();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteHistory(History $history)
    {
        // Prepare Statement
        $sth = $this->conn->prepare('DELETE FROM userhistory WHERE HISTORYINFO = history');
        $sth->biindParam('history', $history);
        
        // Execute Statement
        $result = $sth->execute();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteEducation(Education $education)
    {
        // Prepare Statement
        $sth = $this->conn->prepare('DELETE FROM usereducation WHERE EDUCATIONINFO = Education');
        $sth->biindParam('Education', $education);
        
        // Execute Statement
        $result = $sth->execute();
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
    
?>