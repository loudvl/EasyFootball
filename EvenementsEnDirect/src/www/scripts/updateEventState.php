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
$eventState = filter_input(INPUT_POST,"eventState",FILTER_VALIDATE_INT);
$eventState = ($eventState === false) ? null : $eventState;

if($eventId != null && $eventState !== null)
{
    //Update the current state of an event by its id and owner
     EventManager::updateEventState($eventId,SessionManager::getNickname(),$eventState);
}
?>