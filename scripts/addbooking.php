<?php
include("connect.php");
session_start();

if(isset($_SESSION['userid']) && isset($_POST['travelid'])) {
    $UserId = addslashes($_SESSION['userid']);
    $TravelId = addslashes($_POST['travelid']);

    $STMT=$PDO->query("INSERT INTO `travel_supports_user`(`Id`, `TravelId`, `UserId`) VALUES (NULL, $TravelId, $UserId);");

    if (!$STMT) {
        $dbError = "Impossible d'enregistrer cette réservation dans la base de données";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
    {
        $STMT=$PDO->query("UPDATE `travel` SET `Places_Available` = `Places_Available`-1 WHERE `Id` = $TravelId;");
        if (!$STMT) {
            $dbError = "Impossible d'enregistrer cette réservation dans la base de données";
            error_log($dbError);
            $pdoError = $PDO -> errorInfo()[2];
            error_log($pdoError);
            echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
        }
        else {
            echo "<h1> Réservation rajoute dans la Base de donnees !</h1>";
            header("Location:../search.php");
        }
    }

}
?>