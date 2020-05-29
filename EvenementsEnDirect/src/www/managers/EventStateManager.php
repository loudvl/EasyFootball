<?php
require("../classes/Database.php");

class EventStateManager
{
    public static function getLabel($code)
    {
        $sql = "SELECT LABEL FROM Event_States WHERE CODE = :code";
        $result = "";
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':code',$code, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC)['LABEL'];
        }
        catch(Exception $e)
        {
            echo $e;
            exit;
        }
        return $result;
    }
    public static function getCode($label)
    {
        $sql = "SELECT CODE FROM Event_States WHERE LABEL = :label";
        $result = "";
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':label',$label, PDO::PARAM_STR,60);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC)['CODE'];
        }
        catch(Exception $e)
        {
            echo $e;
            exit;
        }
        return $result;
    }
}
?>