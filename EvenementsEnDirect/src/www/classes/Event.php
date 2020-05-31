<?php
/**
 * This class contains the event informations we get from database
 */
class Event
{
    public $id;
    public $title;
    public $description;
    public $startDate;
    public $endDate;
    public $state;
    public $isVisible;
    public $country;
    public $messages;
    public function __construct($id,$title,$description,$state,$country,$startDate,$endDate,$isVisible='1')
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->state = $state;
        $this->isVisible = $isVisible;
        $this->country = $country;
    }
}
?>