<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/

if (strpos($_SERVER["SCRIPT_NAME"], "index.php"))  //cette page est index.php
{
    echo '<ul class="nav">
    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
    <li><a href="createEvent.php"><i class="glyphicon glyphicon-tasks"></i> Create Event</a></li>
    <li><a href="logout.php"><i class="glyphicon glyphicon-tasks"></i> Disconnect</a></li>
    </ul>';
}
elseif (strpos($_SERVER["SCRIPT_NAME"], "createEvent.php"))  //cette page est createEvent.php
{
    echo '<ul class="nav">
    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
    <li class="current"><a href="createEvent.php"><i class="glyphicon glyphicon-tasks"></i> Create Event</a></li>
    <li><a href="logout.php"><i class="glyphicon glyphicon-tasks"></i> Disconnect</a></li>
    </ul>';
}
else // sinon
{
    echo '<ul class="nav">
    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
    <li><a href="createEvent.php"><i class="glyphicon glyphicon-tasks"></i> Create Event</a></li>
    <li><a href="logout.php"><i class="glyphicon glyphicon-tasks"></i> Disconnect</a></li>
    </ul>';
}
?>
