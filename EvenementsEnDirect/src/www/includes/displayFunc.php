<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once('../managers/CountryManager.php');
require_once('../managers/EventManager.php');
require_once('../managers/SessionManager.php');

/**
 * Generate the country selection component
 *
 * @param string $default
 * @return string
 */
function genCountriesSelect($default = "")
{
    $result = '';
    $countries = CountryManager::getAllCountriesInfos();
    foreach ($countries as $value) {
        if ($value->iso == $default) {
            $result .= "<option value='" . $value->iso . "' selected>" . $value->label . "</option>";
        } else {
            $result .= "<option value='" . $value->iso . "'>" . $value->label . "</option>";
        }
    }
    return $result;
}
/**
 * Generate an event dashboard table
 *
 * @param boolean $filter
 * @return string
 */
function displayDashboard($filter)
{
    $events = null;
    $result = "";
    if ($filter === true) {
        $events = EventManager::getUserEvents(SessionManager::getNickname(), true);
        if ($events != null) {
            foreach ($events as $value) {
                $isVisibleContent = $value->isVisible == 1 ? "<img src='../images/isVisible.png' width='30px' height='30px' title='Visible event'>" : "";
                $modifyBtn = $value->state === "Not Started Yet" ? "<button type=\"button\" class=\"btn btn-primary\" onclick=\"window.location.href='../pages/editEvent.php?eventId=" . $value->id . "'\">Modify</button>" : "";
                $result .= "<tr>
        <td>" . $value->title . "</td>
        <td>" . $value->startDateTime . "</td>
        <td>" . $value->country . "</td>
        <td>" . $value->state . "</td>
        <td class='tdButtons'><button type=\"button\" class=\"btn btn-primary\" onclick=\"window.location.href='../pages/manageEvent.php?eventId=" . $value->id . "'\">Manage</button></td> <td class='tdButtons'>" . $modifyBtn . "</td><td class='tdButtons'>" . $isVisibleContent . "</td>
      </tr>";
            }
        }
    }

    if ($filter === false) {
        $events = EventManager::getUserEvents(SessionManager::getNickname(), false);
        if ($events != null) {
            foreach ($events as $value) {
                $isVisibleContent = $value->isVisible == 1 ? "<img src='../images/isVisible.png' width='30px' height='30px' title='Visible event'>" : "";
                $result .= "<tr>
        <td>" . $value->title . "</td>
        <td>" . $value->startDateTime . "</td>
        <td>" . $value->endDateTime . "</td>
        <td>" . $value->country . "</td>
        <td class='tdButtons'><button type=\"button\" class=\"btn btn-primary\" onclick=\"window.location.href='../pages/manageEvent.php?eventId=" . $value->id . "'\">View</button></td><td class='tdButtons'>" . $isVisibleContent . "</td>
      </tr>";
            }
        }
    }
    return $result;
}
