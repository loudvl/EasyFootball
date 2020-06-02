<?php
require_once('../managers/CountryManager.php');

function genCountriesSelect()
{
    $result = '';
    $countries = CountryManager::getAllCountriesInfos();
    foreach($countries as $value)
    {
        $result .= "<option value='".$value->iso."'>".$value->label."</option>";
    }
    return $result;
}

?>