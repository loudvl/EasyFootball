<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../classes/Database.php");

/**
 * The UserManager give access to functions that are working with user informations
 */
class UserManager
{
    /**
     * Check if user log infos are good
     *
     * @param string $nickname
     * @param string $passwd
     * @return boolean
     */
    public static function connect($nickname,$passwd)
    {
        $sql = "SELECT NICKNAME FROM users WHERE NICKNAME = :nickname AND PASSWD = :passwd AND STATE = 1";

    try
    {
        $query = Database::getInstance()->prepare($sql);
        $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
        $query->bindParam(':passwd',$passwd, PDO::PARAM_STR,64);
        $query->execute();
        if($query->fetch(PDO::FETCH_ASSOC) != null)
        {
            return true;
        }
    }
    catch(Exception $e)
    {
        return FALSE;
    }

    return false;
    }
    /**
     * Check if a user already exist in database
     *
     * @param string $nickname
     * @return boolean
     */
    public static function userExist($nickname)
    {
        $sql = "SELECT NICKNAME FROM users WHERE NICKNAME = :nickname";

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,120);
            $query->execute();
            if($query->fetch(PDO::FETCH_ASSOC) != null)
            {
                return true;
            }
        }
        catch(Exception $e)
        {
            return FALSE;
        }
        return false;
    }
    /**
     * Create a user in database
     *
     * @param string $nickname
     * @param string $email
     * @param string $passwd
     * @return string
     */
    public static function createUser($nickname,$email,$passwd)
    {
        $sql = "INSERT INTO users(NICKNAME,EMAIL,PASSWD,VALIDATION_TOKEN,VALIDATION_TOKEN_EXPIRATION) VALUES (:nickname,:email,:passwd,:token,:token_expiration)";
        $token = "";

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
            $query->bindParam(':email',$email, PDO::PARAM_STR,254);
            $query->bindParam(':passwd',$passwd, PDO::PARAM_STR,64);
            $token = md5(time());
            $query->bindParam(':token',$token, PDO::PARAM_STR,32);
            $date = new DateTime(date("Y-m-d H:i:s"));
            $date->add(new DateInterval('P1D'));
            $tokenExpiration = $date->format('Y-m-d H:i:s');
            $query->bindParam(':token_expiration',$tokenExpiration, PDO::PARAM_STR,19);
            $query->execute();
        }
        catch(Exception $e)
        {
            return FALSE;
        }
        return $token;
    }
    /**
     * Validate the user in the database with his unique token and nickname
     *
     * @param string $nickname
     * @param string $token
     * @return boolean
     */
    public static function validateUser($nickname,$token)
    {
        $sql = "UPDATE users SET state = 1 WHERE NICKNAME = :nickname AND VALIDATION_TOKEN = :token AND NOW() <= VALIDATION_TOKEN_EXPIRATION";

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
            $query->bindParam(':token',$token, PDO::PARAM_STR,32);
            $query->execute();
        }
        catch(Exception $e)
        {
            return FALSE;
        }
        return true;
    }
}
?>