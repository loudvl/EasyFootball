<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../managers/UserManager.php");
$nickname = filter_input(INPUT_GET,"nickname",FILTER_SANITIZE_STRING);
$nickname = ($nickname == null) ? "" : $nickname;
$token = filter_input(INPUT_GET,"token",FILTER_SANITIZE_STRING);
$token = ($token == null) ? "" : $token;
if($nickname != null && $token != null)
{
    UserManager::validateUser($nickname,$token);
}
header("Location: login.php");
?>