<?php
require('../managers/CountryManager.php');

//Get country code with good label
$result = CountryManager::getCode("France");
if($result != "")
{
    echo "<br>Country code : ".$result;
}
else
{
    echo "<br>No country code";
}

echo "<br>--------------------------------------------------------------------";
//Get country code with wrong label
$result = CountryManager::getCode("dwadawd");
if($result != "")
{
    echo "<br>Country code : ".$result;
}
else
{
    echo "<br>No country code";
}


echo "<br>--------------------------------------------------------------------";
//Get country label with good code
$result = CountryManager::getLabel("CH");
if($result != "")
{
    echo "<br>Country label : ".$result;
}
else
{
    echo "<br>No country label";
}


echo "<br>--------------------------------------------------------------------";
//Get country label with wrong code
$result = CountryManager::getLabel("av");
if($result != "")
{
    echo "<br>Country label : ".$result;
}
else
{
    echo "<br>No country label";
}
?>