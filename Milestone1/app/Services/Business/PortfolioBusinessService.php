<?php 
namespace App\Services\Business;
use App\Models\Skills;
use App\Models\History;
use App\Models\Education;
use Illuminate\Support\Facades\Log;
use \PDO;
use App\Services\Database;
use App\Services\Data\PortfolioDataService;

/**
 * @author Mark H.
 * creates Job objects and returns job objects
 */
class PortfolioBusinessService
{
    private $dataService;
    
    /**
     * 
     * @param Skills $skills
     * @return boolean for successful creation
     */
    public function trySetSkills(Skills $skill)
    {
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a Portfolio dataservice with the connection
        $service = new PortfolioDataService($conn);
        //try creating a new Portfolio and return sucessful or not
        $result = $service->createSkills($skill);
        return $result;
    }
    
    /**
     * 
     * @param History $history
     * @return
     */
    public function trySetHistory(History $his)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //create a Portfolio dataservice with the connection
        $service = new PortfolioDataService($conn);
        //try creating a new Portfolio and return sucessful or not
        $result = $service->createHistory($his);
        return $result;
        
    }
    /**
     * 
     * @param Education $education
     * @return
     */
    public function trySetEducation(Education $edu)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //create a Portfolio dataservice with the connection
        $service = new PortfolioDataService($conn);
        //try creating a new Portfolio and return sucessful or not
        $result = $service->createEducation($edu);
        return $result;
        
    }
   /**
    * 
    * @param Skills $skills
    * @return NULL|\App\Models\Skills
    */
    public function tryDisplayAllSkills()
    {
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create UserDataService
        $service = new PortfolioDataService($conn);
        $result = $service->findAllSkills();
        return $result;
    }
    
    public function tryDisplayAllHistory()
    {
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create UserDataService
        $service = new PortfolioDataService($conn);
        $result = $service->findAllHistory();
        return $result;
    }
    
    public function tryDisplayAllEducation()
    {
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create UserDataService
        $service = new PortfolioDataService($conn);
        $result = $service->findAllEducation();
        return $result;
    }
    
    /*
     * updates a single skill
     */
    public function updateSkill(Skills $skill)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Call Data Service pass object
        $result=$this->PortfolioDataService->updateSkill($skill);
        //Return result
        return $result;
    }
    /*
     * updates a single skill
     */
    public function updateHistory(History $history)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Call Data Service pass object
        $result=$this->PortfolioDataService->updateHistory($history);
        //Return result
        return $result;
    }
    /*
     * updates a single skill
     */
    public function updateEducation(Education $education)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Call Data Service pass object
        $result=$this->PortfolioDataService->updateEducation($education);
        //Return result
        return $result;
    }
    
    /*
     * creates database connection and returns whether dataservice delete was successful
     */
    public function tryDeleteSkill(Skills $skill)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $result=$this->PortfolioDataService->deleteSkill($skill);
        return $result;

    }
    
    public function tryDeleteHistory(History $history)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $result=$this->PortfolioDataService->deleteHistory($history);
        return $result;
        
    }
    public function tryDeleteEducation(Education $education)
    {
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $result=$this->PortfolioDataService->deleteEducation($education);
        return $result;
        
    }
  
}
?>