<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
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