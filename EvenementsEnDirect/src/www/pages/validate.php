<?php
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