<?php
class Event
{
    public $id;
    public $description;
    public $startDate;
    public $endDate;
    public $state;
    public $isVisible;
    public $country;
    public function __construct($id,$description,$startDate,$endDate,$state,$isVisible,$country)
    {
        $this->id = $id;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->state = $state;
        $this->isVisible = $isVisible;
        $this->country = $country;
    }
}
?>