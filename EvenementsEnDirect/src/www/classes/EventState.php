<?php
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