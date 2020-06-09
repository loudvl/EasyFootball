<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require('../managers/CountryManager.php');
//Get all countries labels
$countries = CountryManager::getAllCountriesInfos();
$size = count($countries);
for($i = 0;$i < $size;$i++)
{
    foreach($countries[$i] as $key => $value)
    {
        echo "<br>".$key." : ".$value;
    }
}
?>