<?php

class Driver extends User
{
    protected $drivingyear;
    public $departures = array();

    public function Driver($f, $l, $d, $a, $m, $p, $pw, $y)
    {
        $this->fisrtname = $f;
        $this->lastname = $l;
        $this->dateofbirth = new DateTime($d);
        $this->address = $a;
        $this->mail = $m;
        $this->phone = $p;
        $this->password = $pw;
        $this->drivingyear = $y;
    }
}