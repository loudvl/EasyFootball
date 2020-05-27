<?php
class Message
{
    public $id;
    public $text;
    public $postingDate;
    public $eventId;
    public function __construct($id,$text,$postingDate,$eventId)
    {
        $this->id = $id;
        $this->text = $text;
        $this->postingDate = $postingDate;
        $this->eventId = $eventId;
    }
}
?>