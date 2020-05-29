<?php
class SessionManager
{
    public static function addNickname($nickname)
    {
        try
        {
            $_SESSION['NICKNAME'] = $nickname;
        }
        catch(Exception $e)
        {
            return false;
            exit();
        }
        return true;
    }

    public static function getNickname()
    {
        if(isset($_SESSION['NICKNAME']))
        {
            return $_SESSION['NICKNAME'];
            exit();
        }
        return "";
    }
    public static function destroySession()
    {
        try
        {
            $_SESSION = array();
            if (ini_get("session.use_cookies"))
            {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]);
            }
            session_destroy();
        }
        catch(Exception $e)
        {
            return false;
            exit();
        }
        return true;
    }
}
?>