<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("EncodeJWT.php");
require_once("../managers/EventManager.php");

//Filter the inputs
$eventId = filter_input(INPUT_GET,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId == false) ? null : $eventId;

if($eventId != null)
{
    //Get a visible event by its id, encode it and echo result string
    echo EncodeJWT(EventManager::getVisibleEvent($eventId));
}

?>