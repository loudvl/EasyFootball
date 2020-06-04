<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once('../managers/CountryManager.php');

function genCountriesSelect($default = "")
{
    $result = '';
    $countries = CountryManager::getAllCountriesInfos();
    foreach($countries as $value)
    {
        if($value->iso == $default)
        {
            $result .= "<option value='".$value->iso."' selected>".$value->label."</option>";
        }
        else
        {
            $result .= "<option value='".$value->iso."'>".$value->label."</option>";
        }
    }
    return $result;
}

?>