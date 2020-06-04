<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/

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
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
        $this->state = $state;
        $this->isVisible = $isVisible;
        $this->country = $country;
    }
}
?>