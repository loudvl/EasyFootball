<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/

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