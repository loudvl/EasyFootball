<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("../config/dbConfig.php");
/**
 * The Database class that is used to do the queries
 */
class Database
{
    /**
     * Unique instance of the db connection
     *
     * @var PDO
     */
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
    /**
     * Magic function triggered when calling inaccessible static methods with :: operator
     *
     * @param string $chrMethod
     * @param array $arrArguments
     * @return void
     */
    final public static function __callStatic( $chrMethod, $arrArguments ) {
        $_instance = self::getInstance();
        return call_user_func_array(array(self::$_instance, $chrMethod), $arrArguments);
        }
}
