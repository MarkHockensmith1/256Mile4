<?php
namespace App\Services\Business;

use App\Models\Profile;
use App\Services\Data\ProfileDataService;
use Illuminate\Support\Facades\Log;
use PDO;
/**
 * Profile business service class
 * handles all business logic for profile module
 * @author Anthony Natividad
 *
 */
class ProfileBusinessService
{
    private $conn;
    private $dataService;
    /**
     * Constructor that instaniates a data service and connection
     */
    public function __construct(){
        //get database credentials
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        //IMPORTANT:Due to mySql issues using port 3308 For Mark comment out line below
        //$servername ="localhost:3308";
        //Create connection
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dataService = new ProfileDataService($this->conn);
    }
    
    /**
     * Businness service that calls ProfileDAO create method
     * @param Profile $profile
     * @return boolean
     */
    public function makeProfile(Profile $profile){
        //Call data service
        $result = $this->dataService->createProfile($profile);
        
        //Return result
        Log::info("Exit ProfileBusinessService.createProfile() with " . $result);
        return $result;
    }
    
    /**
     * NOT USED YET
     * @param Profile $profile
     * @return boolean
     */
    public function editProfile(Profile $profile){
        $this->dataService->editProfile($profile);
        return true;
    }
    
    /**
     * NOT USED YEt
     * @param $username
     */
    public function getProfile($username){
        $this->dataService->findProfile($username);
    }
    
    /**
     * NOT USED YET
     * @param $username
     */
    public function deleteProfile($username){
        $this->dataService->deleteProfile($username);
    }
}

