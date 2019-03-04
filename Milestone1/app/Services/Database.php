<?php 

namespace App\Services;

use \PDO;

/**
 * 
 * @author Mark
 *
 */
class Database
{
    
    
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "milestone";
    
    function getConnection()
    {
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
  
        
        
        if ($conn->connect_error)
        {
            die("connection failed: " . $conn->connect_error);
        }
        else
        {
            
            return $conn;
            
        }
    }
    
}