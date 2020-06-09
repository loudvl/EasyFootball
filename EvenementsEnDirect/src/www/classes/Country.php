<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/


/**
 * This class contains the informations of a country we get from database
 */
class Country
{
    /**
     * ISO-2 code of a country
     *
     * @var string
     */
    public $iso;
    /**
     * Label of a country
     *
     * @var string
     */
    public $label;
    /**
     * Construct
     *
     * @param string $iso
     * @param string $label
     */
    public function __construct($iso,$label)
    {
        $this->iso = $iso;
        $this->label = $label;
    }
}
?>