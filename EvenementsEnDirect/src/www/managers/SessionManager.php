<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
class SessionManager
{
    /**
     * Add the user nickname in the session
     *
     * @param string $nickname
     * @return boolean
     */
    public static function addNickname($nickname)
    {
        try
        {
            $_SESSION['NICKNAME'] = $nickname;
        }
        catch(Exception $e)
        {
            return FALSE;
        }
        return true;
    }

    /**
     * Get the user nickname from the session
     *
     * @return string
     */
    public static function getNickname()
    {
        if(isset($_SESSION['NICKNAME']))
        {
            return $_SESSION['NICKNAME'];
        }
        return "";
    }

    /**
     * Destroy the current session
     *
     * @return boolean
     */
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
            return FALSE;
        }
        return true;
    }
}
?>