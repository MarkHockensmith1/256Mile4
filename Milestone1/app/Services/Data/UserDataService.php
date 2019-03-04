<?php
namespace App\Services\Data;

use PDO;
use PDOException;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 *
 * @author Anthony N. and Mark H.
 *        
 */
class UserDataService
{

    private $conn;

    /**
     * constructor to set connection
     *
     * @param
     *            $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * Executes select statement to see if user exists
     *
     * @param User $user
     * @return boolean
     */
    public function findUser(User $user)
    {
        try {
            Log:
            info("Entering UDS .findUser()");
            $un = $user->getUsername();
            $pw = $user->getPassword();
            $sth = $this->conn->prepare("SELECT ID FROM users WHERE BINARY USERNAME = :username AND BINARY PASSWORD = :password");
            $sth->bindParam(':username', $un);
            $sth->bindParam(':password', $pw);
            $sth->execute();

            if ($sth->rowCount() == 1) {
                Log::info("Exit SecurityService.findByUser() with true");
                return true;
            } else {
                Log::info("Exit Securityservice.findByUser() with false\nRows = " . $sth->rowCount());
                return false;
            }
        } 
        catch (PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            // throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    /**
     * this will return an actual user back to UBS returnUserData()
     * @param User $user
     */
    public function returnUser(User $user)
    {
        try {
            Log:
            info("Entering UDS returnUser()");
            $un = $user->getUsername();
            $pw = $user->getPassword();
            $sth = $this->conn->prepare("SELECT * FROM users WHERE BINARY USERNAME = :username AND BINARY PASSWORD = :password");
            $sth->bindParam(':username', $un);
            $sth->bindParam(':password', $pw);
            $sth->execute();
            //select user by id and only one user
//             $fn = $sth->fetchColumn(1);//Working on getting individual data values here
//             $ln = $sth->fetchColumn(2);
//             $un = $sth->fetchColumn(3);
//             $pw = $sth->fetchColumn(4);
//             $ad = $sth->fetchColumn(5);
            
          $user = $sth->fetch(PDO::FETCH_ASSOC);
          $count = $sth->rowCount();
          $result = ['result'=>$count,'user'=>$user];
          $sth = null;
          return $result;
            
            //neet to create and return full user here
           // $user = new User($fn, $ln, $un, $pw, $ad);
           // return $user;
            
        }
        catch (PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            // throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
        
        
    }
    /**
     * Executes create statment to add user to database
     *
     * @param User $user
     * @return boolean
     */
    public function createUser(User $user)
    {
        Log:
        info("Entering UDS .createUser()");

        $sth = $this->conn->prepare("INSERT INTO users(FIRSTNAME, LASTNAME, USERNAME, PASSWORD, ADMIN) VALUES(:first, :last, :user, :pass, :admin)");
        $fn = $user->getFirstName();
        $ln = $user->getLastName();
        $un = $user->getUserName();
        $pw = $user->getPassword();
        $ad = $user->getAdmin();

        $sth->bindParam(':first', $fn);
        $sth->bindParam(':last', $ln);
        $sth->bindParam(':user', $un);
        $sth->bindParam(':pass', $pw);
        $sth->bindParam(':admin', $ad);
        $sth->execute();

        if ($sth->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // this will take all users from the database and sore them in an array to be displayed by the admin view.
    public function displayUsers()
    {
        Log:
        info("Entering UDS .displayUsers()");
        $query = $this->conn->prepare("SELECT * FROM users");
        $query->execute();
        
        $allUsers = NULL;
        $i = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $allUsers[$i] = new User($row['firstname'],
                    $row['lastname'],
                    $row['username'],
                    $row['password'],
                    $row['admin']);
            
            $i++;
        }

        return $allUsers;
    }
}