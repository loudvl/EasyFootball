<?php
require_once("../config/dbConfig.php");
/**
 * The Database class that is used to do the queries
 */
class Database
{
    private static $_instance = null;

    private function __construct(){}
    private function __clone(){}

    /**
     * Return a PDO instance, create it if not done already.
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            try
            {
                self::$_instance = new PDO("mysql:host=".HOST.";dbname=".DBNAME,USER,PASSWD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e)
            {
                return FALSE;
            }
        }
        return self::$_instance;
    }

    final public static function __callStatic( $chrMethod, $arrArguments ) {
        $_instance = self::getInstance();
        return call_user_func_array(array(self::$_instance, $chrMethod), $arrArguments);
        }
}
