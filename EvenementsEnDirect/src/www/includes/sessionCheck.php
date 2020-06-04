<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
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