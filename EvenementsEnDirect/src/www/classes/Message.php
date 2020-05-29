<?php
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