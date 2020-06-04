<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/

/**
 * This class contains the informations of an event state we get from database
 */
class EventState
{
    public $code;
    public $label;
    public function __construct($code,$label)
    {
        $this->code = $code;
        $this->label = $label;
    }
}
?>