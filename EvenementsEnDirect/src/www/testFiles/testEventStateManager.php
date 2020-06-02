<?php
require('../managers/EventStateManager.php');

//Get event state code with good label
$result = EventStateManager::getCode("In progress");
if($result != "")
{
    echo "<br>Event state code : ".$result;
}
else
{
    echo "<br>No event state code";
}

echo "<br>--------------------------------------------------------------------";
//Get event state code with wrong label
$result = EventStateManager::getCode("dwadagaawd");
if($result != "")
{
    echo "<br>Event state label : ".$result;
}
else
{
    echo "<br>No event state label";
}


echo "<br>--------------------------------------------------------------------";
//Get event state label with good code
$result = EventStateManager::getLabel(2);
if($result != "")
{
    echo "<br>Event state label : ".$result;
}
else
{
    echo "<br>No event state label";
}


echo "<br>--------------------------------------------------------------------";
//Get event state label with wrong code
$result = EventStateManager::getLabel(10);
if($result != "")
{
    echo "<br>Event state label : ".$result;
}
else
{
    echo "<br>No event state label";
}
?>