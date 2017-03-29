<?php

class Travel
{
    public $itinerary;
    public $departureDate;
    public $nbPassengersAllowed;
    public $driverPreferences;

    public function Travel($i, $d, $pa, $dp)
    {
        $this->itinerary = $i;
        $this->departureDate = $d;
        $this->nbPassengersAllowed = $pa;
        $this->driverPreferences = $dp;
    }
}

?>
