<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once('../classes/Database.php');
require_once('../classes/Event.php');
require_once("../classes/Message.php");

/**
 * This class gives access to data manipulation functionnalities for events
 */
class EventManager
{
    /**
     * Get every visible event from database
     *
     * @param boolean $filter
     * @return array<Event>
     */
    public static function getAllVisibleEvents($filter = true)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,END_DATETIME,Countries_ISO,Event_States.LABEL as STATE FROM events JOIN Event_States ON events.Event_States_CODE = Event_States.CODE WHERE IS_VISIBLE = 1";
        switch ($filter) {
            case false:
                $sql .= " AND Event_States_CODE = 0 ORDER BY START_DATETIME DESC";
                break;
            case true:
                $sql .= " AND Event_States_CODE = 1 OR Event_States_CODE = 2 ORDER BY Event_States_CODE ASC, START_DATETIME DESC";
                break;
        }
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->execute();
            $tempResult = $query->fetchAll(PDO::FETCH_ASSOC);
            $result = array();
            $size = count($tempResult);
            for ($i = 0; $i < $size; $i++) {
                $result[$i] = new Event($tempResult[$i]['ID'], $tempResult[$i]['TITLE'], $tempResult[$i]['DESCRIPTION'], $tempResult[$i]['STATE'], $tempResult[$i]['Countries_ISO'], $tempResult[$i]['START_DATETIME'], $tempResult[$i]['END_DATETIME']);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $result;
    }

    /**
     * Get all events of a specific user from database
     *
     * @param string $nickname
     * @param boolean $filter
     * @return array<Event>
     */
    public static function getUserEvents($nickname, $filter = true)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,END_DATETIME,Countries.LABEL as COUNTRY,Event_States.LABEL as STATE,IS_VISIBLE FROM events JOIN Event_States ON events.Event_States_CODE = Event_States.CODE JOIN Countries ON events.Countries_ISO = Countries.ISO WHERE (Users_NICKNAME = :nickname)";
        switch ($filter) {
            case false:
                $sql .= " AND Event_States_CODE = 0 ORDER BY START_DATETIME DESC";
                break;
            case true:
                $sql .= " AND Event_States_CODE != 0 ORDER BY Event_States_CODE ASC, START_DATETIME ASC";
                break;
        }
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->execute();
            $tempResult = $query->fetchAll(PDO::FETCH_ASSOC);
            $result = array();
            $size = count($tempResult);
            for ($i = 0; $i < $size; $i++) {
                $result[$i] = new Event($tempResult[$i]['ID'], $tempResult[$i]['TITLE'], $tempResult[$i]['DESCRIPTION'], $tempResult[$i]['STATE'], $tempResult[$i]['COUNTRY'], $tempResult[$i]['START_DATETIME'], $tempResult[$i]['END_DATETIME'], $tempResult[$i]['IS_VISIBLE']);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $result;
    }

    /**
     * Get all the messages of an event from the database
     *
     * @param int $eventId
     * @return array<Message>
     */
    public static function getMessages($eventId)
    {
        $sql = "SELECT TEXT,POSTING_DATE,Events_ID FROM messages WHERE Events_ID = :event ORDER BY POSTING_DATE DESC";
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':event', $eventId, PDO::PARAM_INT);
            $query->execute();
            $tempResult = $query->fetchAll(PDO::FETCH_ASSOC);
            $messages = array();
            $size = count($tempResult);
            for ($i = 0; $i < $size; $i++) {
                $messages[$i] = new Message($tempResult[$i]['TEXT'], $tempResult[$i]['POSTING_DATE'], $tempResult[$i]['Events_ID']);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $messages;
    }

    /**
     * Add a new event message to the database if user and event match
     *
     * @param string $message
     * @param int $eventId
     * @param string $nickname
     * @return boolean
     */
    public static function addMessage($message, $eventId, $nickname)
    {
        $sql = "SELECT ID FROM Events WHERE ID = :eventId AND Users_NICKNAME = :nickname AND Event_States_CODE = 1";
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':eventId', $eventId, PDO::PARAM_INT);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->execute();
            if ($query->fetch(PDO::FETCH_ASSOC)['ID'] != null) {
                $sql = "INSERT INTO messages(TEXT,POSTING_DATE,Events_ID) VALUES (:message,:postingDate,:eventId)";
                $query = Database::getInstance()->prepare($sql);
                $query->bindParam(':message', $message, PDO::PARAM_STR, 254);
                $query->bindParam(':eventId', $eventId, PDO::PARAM_INT);
                $date = new DateTime(date("Y-m-d H:i:s"));
                $datetime = $date->format('Y-m-d H:i:s');
                $query->bindParam(':postingDate', $datetime, PDO::PARAM_STR, 19);
                $query->execute();
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * Create a new event in the database
     *
     * @param string $nickname
     * @param string $title
     * @param string $description
     * @param string $country
     * @param string $startDateTime
     * @return boolean
     */
    public static function createEvent($nickname, $title, $description, $country, $startDateTime)
    {
        $sql = "INSERT INTO events(TITLE,DESCRIPTION,START_DATETIME,Users_NICKNAME,Countries_ISO) VALUES (:title,:description,:startDateTime,:nickname,:country)";;
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':title', $title, PDO::PARAM_STR, 70);
            $query->bindParam(':description', $description, PDO::PARAM_STR, 300);
            $query->bindParam(':startDateTime', $startDateTime, PDO::PARAM_STR, 19);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->bindParam(':country', $country, PDO::PARAM_STR, 2);
            $query->execute();
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * Update an event informations in the database
     *
     * @param int $eventId
     * @param string $title
     * @param string $description
     * @param string $country
     * @param string $startDateTime
     * @param boolean $isVisible
     * @return boolean
     */
    public static function updateEvent($eventId, $title, $description, $country, $startDateTime, $isVisible)
    {
        $sql = "UPDATE events SET TITLE = :title,DESCRIPTION = :description,START_DATETIME = :startDateTime,Countries_ISO = :country,IS_VISIBLE = :isVisible WHERE ID = :id AND Event_States_CODE = 2";

        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':title', $title, PDO::PARAM_STR, 70);
            $query->bindParam(':description', $description, PDO::PARAM_STR, 300);
            $query->bindParam(':startDateTime', $startDateTime, PDO::PARAM_STR, 19);
            $query->bindParam(':country', $country, PDO::PARAM_STR, 2);
            $query->bindParam(':isVisible', $isVisible, PDO::PARAM_INT, 1);
            $query->bindParam(':id', $eventId, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * This function get an event in the database based on its id and owner nickname
     *
     * @param int $eventId
     * @param string $nickname
     * @return Event
     */
    public static function getUserEvent($eventId, $nickname)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,IS_VISIBLE,Users_NICKNAME,Countries_ISO FROM events WHERE ID = :event AND Users_NICKNAME = :nickname AND Event_States_CODE = 2";
        $result = null;
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':event', $eventId, PDO::PARAM_INT);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->execute();
            $tempResult = $query->fetch(PDO::FETCH_ASSOC);
            if ($tempResult['ID'] != null) {
                $result = new Event($tempResult['ID'], $tempResult['TITLE'], $tempResult['DESCRIPTION'], 2, $tempResult['Countries_ISO'], $tempResult['START_DATETIME'], null, $tempResult['IS_VISIBLE']);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $result;
    }

    /**
     * Get a specific visible event by his id
     *
     * @param int $eventId
     * @return Event
     */
    public static function getVisibleEvent($eventId)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,END_DATETIME,Countries.LABEL as COUNTRY,Event_States.LABEL as STATE FROM events JOIN Event_States ON events.Event_States_CODE = Event_States.CODE JOIN Countries ON events.Countries_ISO = Countries.ISO WHERE IS_VISIBLE = 1 AND ID = :event";
        $result = null;
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':event', $eventId, PDO::PARAM_INT);
            $query->execute();
            $tempResult = $query->fetch(PDO::FETCH_ASSOC);
            if ($tempResult['ID'] != null) {
                $result = new Event($tempResult['ID'], $tempResult['TITLE'], $tempResult['DESCRIPTION'], $tempResult['STATE'], $tempResult['COUNTRY'], $tempResult['START_DATETIME'], $tempResult['END_DATETIME']);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $result;
    }
    /**
     * Get a specific event by his id and owner nickname
     *
     * @param int $eventId
     * @param string $nickname
     * @return Event
     */
    public static function getEvent($eventId, $nickname)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,END_DATETIME,Countries.LABEL as COUNTRY,IS_VISIBLE,Event_States_CODE as STATE FROM events JOIN Countries ON events.Countries_ISO = Countries.ISO WHERE ID = :event AND Users_NICKNAME = :nickname";
        $result = null;
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':event', $eventId, PDO::PARAM_INT);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->execute();
            $tempResult = $query->fetch(PDO::FETCH_ASSOC);
            if ($tempResult['ID'] != null) {
                $result = new Event($tempResult['ID'], $tempResult['TITLE'], $tempResult['DESCRIPTION'], $tempResult['STATE'], $tempResult['COUNTRY'], $tempResult['START_DATETIME'], $tempResult['END_DATETIME'], $tempResult['IS_VISIBLE']);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $result;
    }

    /**
     * Update the state of and event in the database
     *
     * @param int $eventId
     * @param string $nickname
     * @param int $state
     * @return boolean
     */
    public static function updateEventState($eventId, $nickname, $state)
    {
        $sqlChangeEndDateTime = "";
        if ($state == 0) {
            $sqlChangeEndDateTime = ", END_DATETIME = '" . date("Y-m-d H:i:s", time()) . "'";
        }
        $sql = "UPDATE events SET Event_States_CODE = :state" . $sqlChangeEndDateTime . " WHERE ID = :id AND Users_NICKNAME = :nickname";
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->bindParam(':state', $state, PDO::PARAM_INT, 1);
            $query->bindParam(':id', $eventId, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * update an event visibility state
     *
     * @param int $eventId
     * @param string $nickname
     * @param boolean $isVisible
     * @return boolean
     */
    public static function updateEventVisibility($eventId, $nickname, $isVisible)
    {
        $sql = "UPDATE events SET IS_VISIBLE = :isVisible WHERE ID = :id AND Users_NICKNAME = :nickname";
        $isVisible = ($isVisible == true) ? 1 : 0;
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->bindParam(':isVisible', $isVisible, PDO::PARAM_INT, 1);
            $query->bindParam(':id', $eventId, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * Delete an event from the database
     *
     * @param int $eventId
     * @param string $nickname
     * @return boolean
     */
    public static function deleteEvent($eventId, $nickname)
    {
        $sql = "DELETE FROM Events WHERE ID = :id AND Users_NICKNAME = :nickname AND Event_States_CODE != 1";
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname', $nickname, PDO::PARAM_STR, 30);
            $query->bindParam(':id', $eventId, PDO::PARAM_INT);
            $query->execute();
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * Get the end date and time of an event
     *
     * @param int $eventId
     * @return string
     */
    public static function getEventEnd($eventId)
    {
        $sql = "SELECT END_DATETIME FROM events WHERE ID = :event";
        $result = "";
        try {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':event', $eventId, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC)['END_DATETIME'];
        } catch (Exception $e) {
            return FALSE;
        }
        return $result;
    }
}
