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
    /**
     * Id of the event
     *
     * @var int
     */
    public $id;
    /**
     * Title of the event
     *
     * @var string
     */
    public $title;
    /**
     * Description of the event
     *
     * @var string
     */
    public $description;
    /**
     * The starting date and time of the event
     *
     * @var string
     */
    public $startDateTime;
    /**
     * The ending date and time of the event
     *
     * @var string
     */
    public $endDateTime;
    /**
     * The current state of the event
     *
     * @var string
     */
    public $state;
    /**
     * Is the event visible
     *
     * @var boolean
     */
    public $isVisible;
    /**
     * Le pays de l'événement
     *
     * @var int
     */
    public $country;
    /**
     * Construct
     *
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $state
     * @param string $country
     * @param string $startDateTime
     * @param string $endDateTime
     * @param int $isVisible
     */
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