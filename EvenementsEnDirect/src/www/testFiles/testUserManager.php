<?php
require('../managers/UserManager.php');
if(UserManager::userExist("lou.dvl"))
{
    echo "User exist";
}
else
{
    echo "User doesn't exist";
}

// Good user values
$token = UserManager::createUser("lou.dvl","lou.dvl@eduge.ch",hash("sha256",("Super")));
if($token != "")
{
    echo "<br>User token : ".$token;
}
else
{
    echo "<br>No user created";
}

// Wrong log values
if(UserManager::connect("WrongNickname","WrongPassword"))
{
    echo "<br>Login Succes";
}
else
{
    echo "<br>Login Wrong values";
}
//Good log values
if(UserManager::connect("lou.dvl","Super"))
{
    echo "<br>Login Succes";
}
else
{
    echo "<br>Login Wrong values";
}
?>