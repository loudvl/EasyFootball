<?php
require_once("../managers/EventManager.php");
require_once("../managers/SessionManager.php");
session_start();

$text = filter_input(INPUT_POST,'text',FILTER_SANITIZE_STRING);
$text = ($text == null) ? "" : $text;
$eventId = filter_input(INPUT_POST,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId == false) ? null : $eventId;

if($eventId != null && $text != "")
{
    EventManager::addMessage($text,$eventId,SessionManager::getNickname());
}
?>