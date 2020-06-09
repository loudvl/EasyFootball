<?php
header('Content-Type: application/json');
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("EncodeJWT.php");
require_once("../managers/EventManager.php");
//Filter the inputs
$eventId = filter_input(INPUT_GET,"eventId",FILTER_VALIDATE_INT);
$eventId = ($eventId === false) ? null : $eventId;

if($eventId != null)
{
    ob_clean();
    //Get event messages by event id, encode them and echo result string
    echo json_encode(EventManager::getMessages($eventId));
}

?>