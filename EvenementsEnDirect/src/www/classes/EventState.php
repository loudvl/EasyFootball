<?php
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