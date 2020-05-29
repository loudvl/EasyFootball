<?php
require("../classes/Database.php");

class CountryManager
{
    public static function getLabel($iso)
    {
        $sql = "SELECT LABEL FROM countries WHERE ISO = :iso";
        $result = "";
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':iso',$iso, PDO::PARAM_STR,2);
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
        $sql = "SELECT ISO FROM countries WHERE LABEL = :label";
        $result = "";
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':label',$label, PDO::PARAM_STR,60);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC)['ISO'];
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