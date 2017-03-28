<?php

class User
{
    protected $firstname = "";
    protected $lastname = "";
    protected $dateofbirth; // YYYY-MM-DD
    protected $address = "";
    protected $mail = "";
    protected $phone;
    protected $password = "";

    public function User($f, $l, $d, $a, $m, $p, $pw)
    {
        $this->fisrtname = $f;
        $this->lastname = $l;
        $this->dateofbirth = new DateTime($d);
        $this->address = $a;
        $this->mail = $m;
        $this->phone = $p;
        $this->password = $pw;
    }

}
?>