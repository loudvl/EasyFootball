<?php
require('../managers/UserManager.php');

// Wrong values
if(UserManager::connect("WrongNickname","WrongPassword"))
{
    echo "Succes";
}
else
{
    echo "Wrong values";
}
//Good values
if(UserManager::connect("lou.dvl","Super"))
{
    echo "Succes";
}
else
{
    echo "Wrong values";
}
?>