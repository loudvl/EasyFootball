<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../includes/sessionCheck.php");
require("../managers/SessionManager.php");
SessionManager::destroySession();
header('Location: login.php');