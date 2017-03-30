<?php

ini_set("display_errors", 0);
ini_set('default_charset', 'UTF8');
try
{
    $USER = 'root';
    $PASS = '';
    $DTBS = 'bd_hamidoexpress';
    $HOST = 'localhost';

    $PDO = new PDO("mysql:host=" .$HOST. ";charset=utf8;dbname=" . $DTBS, $USER, $PASS);
    $STMT=$PDO->query("");
}
catch (Exception $e)
{
    echo "Erreur de connexion";
    echo $e;
}
?>