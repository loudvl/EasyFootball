<?php
require('../classes/Database.php');
require('../classes/Event.php');
require("../classes/Message.php");

class EventManager
{
    public static function getAllVisibleEvents($filter = 1)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,END_DATETIME,Countries_ISO,Event_States_CODE FROM events WHERE IS_VISIBLE = 1";
        switch($filter)
        {
            case 0:
            $sql.=" AND Event_States_CODE = 0 ORDER BY START_DATETIME DESC";
            break;
            case 1:
            $sql.=" AND Event_States_CODE = 1 OR Event_States_CODE = 2 ORDER BY Event_States_CODE ASC, START_DATETIME DESC";
            break;
        }
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->execute();
            $tempResult = $query->fetchAll(PDO::FETCH_ASSOC);
            $result = array();
            for($i=0;$i < count($tempResult);$i++)
            {
                $result[$i] = new Event($tempResult[$i]['ID'],$tempResult[$i]['TITLE'],$tempResult[$i]['DESCRIPTION'],$tempResult[$i]['Event_States_CODE'],$tempResult[$i]['Countries_ISO'],$tempResult[$i]['START_DATETIME'],$tempResult[$i]['END_DATETIME']);
            }
        }
        catch(Exception $e)
        {
            return array();
            exit;
        }
        return $result;
    }

    public static function getUserEvents($nickname,$filter = 1)
    {
        $sql = "SELECT ID,TITLE,DESCRIPTION,START_DATETIME,END_DATETIME,Countries_ISO,Event_States_CODE,IS_VISIBLE FROM events WHERE Users_NICKNAME = :nickname";
        switch($filter)
        {
            case 0:
            $sql.=" AND Event_States_CODE = 0 ORDER BY START_DATETIME DESC";
            break;
            case 1:
            $sql.=" AND Event_States_CODE = 1 OR Event_States_CODE = 2 ORDER BY Event_States_CODE ASC, START_DATETIME DESC";
            break;
        }
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
            $query->execute();
            $tempResult = $query->fetchAll(PDO::FETCH_ASSOC);
            $result = array();
            for($i=0;$i < count($tempResult);$i++)
            {
                $result[$i] = new Event($tempResult[$i]['ID'],$tempResult[$i]['TITLE'],$tempResult[$i]['DESCRIPTION'],$tempResult[$i]['Event_States_CODE'],$tempResult[$i]['Countries_ISO'],$tempResult[$i]['START_DATETIME'],$tempResult[$i]['END_DATETIME'],$tempResult[$i]['IS_VISIBLE']);
            }
        }
        catch(Exception $e)
        {
            return array();
            exit;
        }
        return $result;
    }

    public static function getMessages($eventId)
    {
        $sql = "SELECT TEXT,POSTING_DATE,Events_ID FROM messages WHERE Events_ID = :event ORDER BY POSTING_DATE ASC";
        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':event',$eventId, PDO::PARAM_INT);
            $query->execute();
            $tempResult = $query->fetchAll(PDO::FETCH_ASSOC);
            $messages = array();
            for($i=0;$i < count($tempResult);$i++)
            {
                $messages[$i] = new Message($tempResult[$i]['TEXT'],$tempResult[$i]['POSTING_DATE'],$tempResult[$i]['Events_ID']);
            }
        }
        catch(Exception $e)
        {
            return array();
            exit;
        }
        return $messages;
    }

    public static function createEvent($nickname,$title,$description,$country,$startDateTime)
    {
        $sql = "INSERT INTO events(TITLE,DESCRIPTION,START_DATETIME,Users_NICKNAME,Countries_ISO) VALUES (:title,:description,:startDateTime,:nickname,:country)";

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':title',$title, PDO::PARAM_STR,70);
            $query->bindParam(':description',$description, PDO::PARAM_STR,300);
            $query->bindParam(':startDateTime',$startDateTime, PDO::PARAM_STR,19);
            $query->bindParam(':nickname',$nickname, PDO::PARAM_STR,30);
            $query->bindParam(':country',$country, PDO::PARAM_STR,2);
            $query->execute();
        }
        catch(Exception $e)
        {
            echo $e;
            return false;
            exit;
        }
        return true;
    }

    public static function updateEvent($eventId,$title,$description,$country,$startDateTime,$isVisible)
    {
        $sql = "UPDATE events SET TITLE = :title,DESCRIPTION = :description,START_DATETIME = :startDateTime,Countries_ISO = :country,IS_VISIBLE = :isVisible WHERE ID = :id";

        try
        {
            $query = Database::getInstance()->prepare($sql);
            $query->bindParam(':title',$title, PDO::PARAM_STR,70);
            $query->bindParam(':description',$description, PDO::PARAM_STR,300);
            $query->bindParam(':startDateTime',$startDateTime, PDO::PARAM_STR,19);
            $query->bindParam(':country',$country, PDO::PARAM_STR,2);
            $query->bindParam(':isVisible',$isVisible, PDO::PARAM_INT,1);
            $query->bindParam(':id',$eventId, PDO::PARAM_INT);
            $query->execute();
        }
        catch(Exception $e)
        {
            echo $e;
            return false;
            exit;
        }
        return true;
    }
}
?>