<?php
namespace App\Services\Business;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use \PDO;
use App\Services\Data\UserDataService;

/**
 * Bussiness Logic for Login and Register modules
 * @author Anthony N. and Mark H.
 *
 */
class UserBusinessService
{
    private $dataService;
    
    /**
     * method calls UserDataService findUser function
     * @param User $user
     * @return boolean
     */
    public function tryLogin(User $user){
        
        Log::info("Entering UBS construct");
        
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
      
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create UserDataService
        $service = new UserDataService($conn);
        
        //call service
        $flag = $service->findUser($user);
        
        Log::info("Exit SecuirtyService.login() with " . $flag);
        return $flag;
    }
    
    /**
     * this function finds a user from the database(from data layer) and returns a full user
     * @param User $user
     * @return \App\Models\User
     */
    public function returnUserData($user)
    {
        Log::info("Entering UBS rUD");
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new UserDataService($conn);
        $user = $service->returnUser($user);
        if($user['user']['ADMIN']==1)
        {
            return true;
        }
        return false;
        
    }
    
    /**
     * calls data service to add a new user to table
     * @param User $user
     * @return boolean
     */
    public function tryRegister(User $user)//may be $user
    {
        Log::info("Entering UBS construct");
        
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Comment out for mark
        
        //$servername = "localhost:3308";
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create UserDataService
        $service = new UserDataService($conn);
        $result = $service->createUser($user);
        
        return $result;
    }
    /**
     * 
     * @return 
     */
    public function tryDisplayUsers()
    {
        Log::info("Entering UBS construct");
        
        //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        //Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create UserDataService
        $service = new UserDataService($conn);
        $result = $service->displayUsers();
        
        return $result;
    }
    
}

