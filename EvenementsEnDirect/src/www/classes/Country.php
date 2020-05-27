<?php
class Country
{
    public $ISO;
    public $label;
    public function __construct($ISO,$label)
    {
        $this->ISO = $ISO;
        $this->label = $label;
    }
}
?>