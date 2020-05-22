<?php
require("../config/sessionConst.php");
session_start();

// Interdit l'accès si pas authentifié
if (!isset($_SESSION[SESSION_EMAIL])) {
    if (!strpos($_SERVER["SCRIPT_NAME"], "login.php"))  //cette page n'est pas login.php
    {
        header('Location: login.php');
    }
}
if (isset($_SESSION[SESSION_EMAIL])) {
    if (strpos($_SERVER["SCRIPT_NAME"], "login.php"))
    {
        header('Location: index.php');
    }
}