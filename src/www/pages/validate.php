<?php
require("../managers/UserManager.php");

$token = filter_input(INPUT_GET,"token",FILTER_SANITIZE_STRING);
$token = ($token == null) ? "" : $token;
if($token != null)
{
    UserManager::validateUser($token);
}
header("Location: login.php");
?>