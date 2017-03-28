<?php

ini_set("display_errors", 0);
ini_set('default_charset', 'UTF8');
try
{
    $USER = '';
    $PASS = '';
    $DTBS = '';
    $HOST = '120.0.0.1';

    $PDO = new PDO("mysql:host=" .$HOST. ";charset=utf8;dbname=" . $DTBS, $USER, $PASS);
    $STMT=$PDO->query("");
}
catch (Exception $e)
{
    echo "Erreur de connexion";
    echo $e;
}
?>