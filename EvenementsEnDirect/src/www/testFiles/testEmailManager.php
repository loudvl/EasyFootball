<?php
require('../managers/EmailManager.php');
//Sending and email
if(EmailManager::sendEmail("lou.dvl@eduge.ch","Testing email","This is a test email to make sur the manager work"))
{
    echo "Email sent";
}
else
{
    echo "Couldn't send email";
}
?>