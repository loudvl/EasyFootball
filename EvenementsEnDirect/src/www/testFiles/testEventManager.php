<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require('../managers/EventManager.php');
//Getting all visible past events
$result = EventManager::getAllVisibleEvents(false);
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
echo "<br>------------------------------------------";
//Getting all visible in progress/not started yet events
$result = EventManager::getAllVisibleEvents(true);
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
echo "<br>------------------------------------------";
//Default : Getting all visible in progress/not started yet events
$result = EventManager::getAllVisibleEvents();
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
echo "<br>------------------------------------------";



//Getting all old events of a specific user
$result = EventManager::getUserEvents("lou.dvl", false);
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
echo "<br>------------------------------------------";
//Getting all in progress/not started yet events of a specific user
$result = EventManager::getUserEvents("lou.dvl", true);
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
echo "<br>------------------------------------------";
//Default : Getting all in progress/not started yet events of a specific user
$result = EventManager::getUserEvents("lou.dvl");
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
echo "<br>------------------------------------------";

//Creating an event with good values
if (EventManager::createEvent("lou.dvl", "New test event", "Created test event", "GB", (new DateTime("2020-10-08 12:30:00"))->format('Y-m-d H:i:s'))) {
    echo "<br>Event created";
} else {
    echo "<br>Couldn't create event";
}

echo "<br>------------------------------------------";

//Creating an event with wrong country CODE
if (EventManager::createEvent("lou.dvl", "New test event", "Created test event", "EN", (new DateTime("2020-10-08 12:30:00"))->format('Y-m-d H:i:s'))) {
    echo "<br>Event created";
} else {
    echo "<br>Couldn't create event";
}

echo "<br>------------------------------------------";

//Creating an event with good values
if (EventManager::updateEvent(56, "New test event", "Changed test event", "GB", (new DateTime("2020-10-08 12:30:00"))->format('Y-m-d H:i:s'), 0)) {
    echo "<br>Event updated";
} else {
    echo "<br>Couldn't update event";
}

echo "<br>------------------------------------------";

if (EventManager::addMessage("A new message to test the functionnality", 56)) {
    echo "<br>New message added";
} else {
    echo "<br>Can't add a new message";
}

echo "<br>------------------------------------------";
$result = EventManager::getMessages(56);
for ($i = 0; $i < count($result); $i++) {
    foreach ($result[$i] as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}

echo "<br>------------------------------------------";

$result = EventManager::getEvent(95, "lou.dvl");
foreach ($result as $key => $value) {
    echo "<br>" . $key . " : " . $value;
}

echo "<br>------------------------------------------";

$result = EventManager::getEvent(95, "randomUser");
if ($result != null) {
    foreach ($result as $key => $value) {
        echo "<br>" . $key . " : " . $value;
    }
}
else
{
    echo "<br>Can't get event";
}
