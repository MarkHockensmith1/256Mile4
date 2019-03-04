<?php
namespace App\Services\Business;

use PDO;

class JobPostingBusinessService
{
    private $conn;
    private $dataService;
    
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
        $this;
        
    }
}

