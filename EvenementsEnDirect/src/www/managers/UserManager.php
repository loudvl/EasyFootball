<?php
require("../classes/Database.php");
class UserManager
{
    /**
     * Check if user log infos are good, return true or false
     *
     * @param [string] $nickname
     * @param [string] $passwd
     * @return bool
     */
    public static function connect($nickname,$passwd)
    {
        $passwd = hash("sha256",$passwd);
        $sql = "SELECT NICKNAME FROM users WHERE NICKNAME = :nickname AND PASSWD = :passwd";

    try
    {
        $query = Database::getInstance()->prepare($sql);
        $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
        $query->bindParam(':passwd',$passwd, PDO::PARAM_STR,64);
        $query->execute();
        if($query->fetch(PDO::FETCH_ASSOC) != null)
        {
            return true;
            exit();
        }
    }
    catch(Exception $e)
    {
        echo $e;
    }

    return false;
    }

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
                exit();
            }
        }
        catch(Exception $e)
        {
        echo $e;
        }
        return false;
    }

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
            $token = "";
            echo $e;
        }
        return $token;
    }

    public static function validateUser($nickname,$token)
    {
        $sql = "UPDATE users SET state = 1 WHERE VALIDATION_TOKEN = :token AND NICKNAME = :nickname";

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
            $query->bindParam(':token',$token, PDO::PARAM_STR,32);
            $query->execute();
        }
        catch(Exception $e)
        {
            echo $e;
            return false;
            exit();
        }
        return true;
    }
}
?>