<?php
require("../db/database.php");
class UserManager
{
    public static function Connect($email,$passwd)
    {
        $passwd = sha1($passwd);
        $sql = "SELECT email FROM user WHERE email = :email AND passwd = :passwd";
        $db = Database::getInstance();
        $query = null;
        try
        {
            $query = $db->prepare($sql);
        }
        catch(Exception $e)
        {
            echo $e;
        }

    try
    {
        $query->bindParam(':email',$email, PDO::PARAM_STR,120);
        $query->bindParam(':passwd',$passwd, PDO::PARAM_STR,100);
        $query->execute();
        if($query->fetch(PDO::FETCH_ASSOC) != null)
        {
            return true;
        }
    }
    catch(Exception $e)
    {
        $result = false;
    }

    return false;
    }

    public static function UserExist($email)
    {
        $sql = "SELECT email FROM user WHERE email = :email";
        $db = Database::getInstance();
        $query = null;
        try
        {
            $query = $db->prepare($sql);
        }
        catch(Exception $e)
        {
            echo $e;
        }

        try
        {
            $query->bindParam(':email',$email, PDO::PARAM_STR,120);
            $query->execute();
            if($query->fetch(PDO::FETCH_ASSOC) != null)
            {
                return true;
            }
            else{
                return false;
            }
        }
        catch(Exception $e)
        {
        echo $e;
        }
    }

    public static function createUser($user)
    {
        $sql = "INSERT INTO user(email,passwd,TOKEN_VALIDATION,TOKEN_EXPIRATION_DATE) VALUES (:email,:passwd,:token,:token_expiration)";
        $db = Database::getInstance();
        $query = null;
        $token = "";
        try
        {
            $query = $db->prepare($sql);
        }
        catch(Exception $e)
        {
            echo $e;
        }

        try
        {
            $query->bindParam(':email',$user->email, PDO::PARAM_STR,120);
            $query->bindParam(':passwd',$user->passwd, PDO::PARAM_STR,120);
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

    public static function validateUser($token)
    {
        $sql = "UPDATE user SET verified = 1 WHERE TOKEN_VALIDATION = :token";
        $db = Database::getInstance();
        $query = null;
        try
        {
            $query = $db->prepare($sql);
        }
        catch(Exception $e)
        {
            echo $e;
        }

        try
        {
            $query->bindParam(':token',$token, PDO::PARAM_STR,32);
            $query->execute();
        }
        catch(Exception $e)
        {
            $token = "";
            echo $e;
        }
    }

    public static function getUserProfilePic($email)
    {
        $sql = "SELECT base64ProfilePic FROM user WHERE email = :email";
        $db = Database::getInstance();
        $query = null;
        try
        {
            $query = $db->prepare($sql);
        }
        catch(Exception $e)
        {
            echo $e;
        }

        try
        {
            $query->bindParam(':email',$email, PDO::PARAM_STR,150);
            $query->execute();
        }
        catch(Exception $e)
        {
            echo $e;
        }
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>