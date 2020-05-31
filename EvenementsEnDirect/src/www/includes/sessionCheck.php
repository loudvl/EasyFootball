<?php
session_start();

// Interdit l'accès si pas authentifié
if (!isset($_SESSION['NICKNAME'])) {
    if (!strpos($_SERVER["SCRIPT_NAME"], "login.php"))  //cette page n'est pas login.php
    {
        header('Location: login.php');
    }
}
if (isset($_SESSION['NICKNAME'])) {
    if (strpos($_SERVER["SCRIPT_NAME"], "login.php"))//cette page est login.php
    {
        header('Location: index.php');
    }
}