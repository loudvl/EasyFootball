<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
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