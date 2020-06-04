<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../classes/Database.php");

class EventStateManager
{
    /**
     * Get the label of an event state from the database based on its code
     *
     * @param int $code
     * @return string
     */
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
            return FALSE;
        }
        return $result;
    }

    /**
     * Get the code of an event state from the database based on label
     *
     * @param string $label
     * @return int
     */
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