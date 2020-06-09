<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("EncodeJWT.php");
require_once("../managers/EventManager.php");

//Filter the inputs
$filter = filter_input(INPUT_GET,"filter",FILTER_VALIDATE_BOOLEAN);
$filter = ($filter != false) ? true : false;

switch($filter)
{
    //Get all visible in progress/not started yet events,encode it and echo result string
    case true :
        echo EncodeJWT(EventManager::getAllVisibleEvents());
    break;
    //Get all visible in past events,encode it and echo result string
    case false :
        echo EncodeJWT(EventManager::getAllVisibleEvents(false));
    break;
    //Get all visible in progress/not started yet events,encode it and echo result string
    default:
        echo EncodeJWT(EventManager::getAllVisibleEvents());
break;
}

?>