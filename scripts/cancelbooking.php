<?php
include("connect.php");
session_start();

if(isset($_SESSION['userid']) && isset($_POST['travelid'])) {
    $UserId = addslashes($_SESSION['userid']);
    $TravelId = addslashes($_POST['travelid']);

    $STMT=$PDO->query("DELETE FROM `travel_supports_user` WHERE TravelId = $TravelId AND UserId = $UserId;");

    if (!$STMT) {
        $dbError = "Impossible d'annulation cette réservation dans la base de données 1";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
    {
        $STMT=$PDO->query("UPDATE `travel` SET `Places_Available` = `Places_Available`+1 WHERE `Id` = $TravelId;");
        if (!$STMT) {
            $dbError = "Impossible d'annulation cette réservation dans la base de données 2";
            error_log($dbError);
            $pdoError = $PDO -> errorInfo()[2];
            error_log($pdoError);
            echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
        }
        else {
            $STMT=$PDO->query("UPDATE `users` SET `Cancelling` = `Cancelling`+1 WHERE `Id` = $UserId;");
            if (!$STMT) {
                $dbError = "Impossible d'annulation cette réservation dans la base de données 2";
                error_log($dbError);
                $pdoError = $PDO -> errorInfo()[2];
                error_log($pdoError);
                echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
            }else {
                echo "<h1> Réservation annulé dans la Base de donnees !</h1>";
                header("Location:../page_member.php");
            }
        }
    }

}
?>