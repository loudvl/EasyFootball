<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("../managers/EventManager.php");
require_once("../managers/SessionManager.php");
session_start();

$eventId = filter_input(INPUT_GET,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId == false) ? null : $eventId;

if($eventId != null)
{
    echo EventManager::deleteEvent($eventId,SessionManager::getNickname());
}
header("Location: ../pages/index.php");
?>