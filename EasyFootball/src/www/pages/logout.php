<?php
require("../includes/sessionCheck.php");
require("../managers/SessionManager.php");
SessionManager::destroySession();
header('Location: login.php');