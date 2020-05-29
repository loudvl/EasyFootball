<?php
require('../managers/SessionManager.php');
session_start();
//Adding nickname to session
if(SessionManager::addNickname("lou.dvl"))
{
    echo "User added to session";
}
else
{
    echo "Couldn't add user to session";
}

// Getting nickname in session
$nickname = SessionManager::getNickname();
if($nickname != "")
{
    echo "<br>User nickname : ".$nickname;
}
else
{
    echo "<br>No user nickname in session";
}

// Destroying current session
if(SessionManager::destroySession())
{
    echo "<br>Session destroyed";
}
else
{
    echo "<br>Couldn't destroy session";
}

// Getting nickname in session
$nickname = SessionManager::getNickname();
if($nickname != "")
{
    echo "<br>User nickname : ".$nickname;
}
else
{
    echo "<br>No user nickname in session";
}
?>