<?php
namespace App\Services\Data;

use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use PDOException;
/**
 * 
 * @author Anthony Natividad
 *
 */
class ProfileDataService
{

    private $conn;

    /**
     * 
     * @param  $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * 
     * @param $username
     * @return NULL
     */
    public function findProfile($username)
    {
        $sql = "SELECT * FROM profiles WHERE BINARY USERNAME = $username";
        $result = $this->conn->query($sql);

        return null;
    }

    /**
     * 
     * @param Profile $profile
     * @return boolean
     */
    public function editProfile(Profile $profile)
    {
        $sql = "UPDATE profiles SET DESCRIPTION, STATE, TITLE, SKILLS, EMAIL, PHONE_NO) SET DESCRIPTION ='" . $profile->getDescription() . "',STATE ='" . $profile->getStatus() . "',TITLE ='" . $profile->getTitle() . "',SKILLS='" . $profile->getSkills() . "',EMAIL='" . $profile->getEmail() . "' WHERE USER_ID = 1";
        return true;
    }

    /**
     * 
     * @param $username
     * @return boolean
     */
    public function deleteProfile($username)
    {
        return true;
    }

    /**
     * 
     * @param Profile $profile
     * @return boolean
     */
    public function createProfile(Profile $profile)
    {
        Log::info("Entering ProfileDAO createProfile()");
        try {
            //get object data
            $desc = $profile->getDescription();
            $title = $profile->getTitle();
            $state = $profile->getStatus();
            $skills = $profile->getSkills();
            $email = $profile->getEmail();
            $phone = $profile->getPhoneNo();
            
            //prepare statement and bind parrameters
            $sth =$this->conn->prepare('INSERT INTO profiles(USER_ID, DESCTIPTION, STATE, TITLE, SKILLS, EMAIL, PHONE_NO) VALUES(1,:desc,:state,:title,:skills,:email,:phone)');
            $sth->bindParam(':desc',$desc);
            $sth->bindParam(':state',$state);
            $sth->bindParam(':title',$title);
            $sth->bindParam(':skills',$skills);
            $sth->bindParam(':email',$email);
            $sth->bindParam(':phone',$phone);
            //$sth->execute();
            $result = $sth->execute();
            
            if ($result) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            // throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}

