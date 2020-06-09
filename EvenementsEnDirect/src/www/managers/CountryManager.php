<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once('../classes/Database.php');
require_once('../classes/Country.php');

/**
 * This class gives access to some actions related to a country
 */
class CountryManager
{

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