<?php
require_once("../config/dbConfig.php");

class Database
{
    private static $_instance = null;

    private function __construct(){}
    private function __clone(){}
    
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
                echo "Error : ".$e;
            }
        }
        return self::$_instance;
    }

    final public static function __callStatic( $chrMethod, $arrArguments ) {
        $_instance = self::getInstance();
        return call_user_func_array(array(self::$_instance, $chrMethod), $arrArguments);
        }
}
