<?php
require_once("../managers/EventManager.php");
require_once("../managers/SessionManager.php");
session_start();

$eventId = filter_input(INPUT_POST,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId == false) ? null : $eventId;
$isVisible = filter_input(INPUT_POST,"isVisible",FILTER_VALIDATE_INT);
$isVisible = ($isVisible === false) ? null : $isVisible;

if($eventId != null && $isVisible !== null && $isVisible === 0 || $isVisible === 1)
{
    EventManager::updateEventVisibility($eventId,SessionManager::getNickname(),$isVisible);
}
?>