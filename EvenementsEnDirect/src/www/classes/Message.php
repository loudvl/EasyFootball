<?php
/**
 * This class contains the informations of a message we get from database
 */
class Message
{
    public $text;
    public $postingDate;
    public $eventId;
    public function __construct($text,$postingDate,$eventId)
    {
        $this->text = $text;
        $this->postingDate = $postingDate;
        $this->eventId = $eventId;
    }
}
?>