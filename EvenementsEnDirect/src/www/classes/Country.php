<?php
/**
 * This class contains the informations of a country we get from database
 */
class Country
{
    public $iso;
    public $label;
    public function __construct($iso,$label)
    {
        $this->iso = $iso;
        $this->label = $label;
    }
}
?>