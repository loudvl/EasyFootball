<?php
require_once("../managers/EventManager.php");
require_once("../managers/SessionManager.php");
session_start();

$eventId = filter_input(INPUT_POST,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId == false) ? null : $eventId;
$eventState = filter_input(INPUT_POST,"eventState",FILTER_VALIDATE_INT);
$eventState = ($eventState === false) ? null : $eventState;

if($eventId != null && $eventState !== null)
{
    echo EventManager::updateEventState($eventId,SessionManager::getNickname(),$eventState);
}
else
{
    echo "error";
}
?>