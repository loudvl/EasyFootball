<?php
/**
 * This class contains the event informations we get from database
 */
class Event
{
    public $id;
    public $title;
    public $description;
    public $startDateTime;
    public $endDateTime;
    public $state;
    public $isVisible;
    public $country;
    public $messages;
    public function __construct($id,$title,$description,$state,$country,$startDateTime,$endDateTime = null,$isVisible='1')
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->startDateTime = new DateTime($startDateTime);
        $this->endDateTime = new DateTime($endDateTime);
        $this->state = $state;
        $this->isVisible = $isVisible;
        $this->country = $country;
    }
}
?>