<?php

class Itinerary
{
    public $departureTown;
    public $arrivalTown;
    public $price;

    public function Itinerary($d, $a, $p)
    {
        $this->departureTown = $d;
        $this->arrivalTown = $a;
        $this->price = $p;
    }
}

?>