<?php
require('../managers/CountryManager.php');

function genCountriesSelect()
{
    $result = '';
    $countries = CountryManager::getAllCountriesInfos();
    $size = count($countries);
    for($i = 0;$i < $size;$i++)
    {
        foreach($countries[$i] as $key => $value)
        {
            $result .= "<option value='".." : ".$value;
        }
    }
}

?>