<?php

session_start();

// Interdit l'accès si pas authentifié
if (!isset($_SESSION["email"])) {
    if (!strpos($_SERVER["SCRIPT_NAME"], "login.php"))  //cette page n'est pas login.php
    {
        header('Location: login.php');
    }
}
if (isset($_SESSION["email"])) {
    if (strpos($_SERVER["SCRIPT_NAME"], "login.php"))
    {
        header('Location: index.php');
    }
}