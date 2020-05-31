<?php
require('../classes/Database.php');
require('../classes/Country.php');

class CountryManager
{
    /**
     * Get the label of a country from the database based on its iso code
     *
     * @param string $iso
     * @return string
     */
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
            return FALSE;
        }
        return $result;
    }

    /**
     * Get the ISO code of a country from the database based on its label
     *
     * @param string $label
     * @return string
     */
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
            return FALSE;
        }
        return $result;
    }

    /**
     * Get all the countries infos from the database
     *
     * @return array<Country>
     */
    public static function getAllCountriesInfos()
    {
        $sql = "SELECT ISO, LABEL FROM Countries";
        $result = array();

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->execute();
            $countries = $query->fetchAll(PDO::FETCH_ASSOC);
            $size = count($countries);
            for($i = 0;$i < $size;$i++)
            {
                array_push($result,new Country($countries[$i]['ISO'],$countries[$i]['LABEL']));
            }
        }
        catch(Exception $e)
        {
            return FALSE;
        }
        return $result;
    }
}
?>