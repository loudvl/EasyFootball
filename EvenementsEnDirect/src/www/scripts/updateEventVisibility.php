<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("../managers/EventManager.php");
require_once("../managers/SessionManager.php");
session_start();
//Filter the inputs
$eventId = filter_input(INPUT_POST,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId == false) ? null : $eventId;
$isVisible = filter_input(INPUT_POST,"isVisible",FILTER_VALIDATE_INT);
$isVisible = ($isVisible === false) ? null : $isVisible;

if($eventId != null && $isVisible !== null && $isVisible === 0 || $isVisible === 1)
{
    //Update an event visibility by its id and owner
    EventManager::updateEventVisibility($eventId,SessionManager::getNickname(),$isVisible);
}
?>