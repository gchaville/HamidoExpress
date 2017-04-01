<?php
include("connect.php");

if(isset($_SESSION['username'])) {
    $Travel = array(addslashes($_POST['datedeparture']), addslashes($_SESSION['username']), addslashes($_POST['nbPassenger']));

    $STMT = $PDO->query("SELECT Id FROM  `itinerary`
                          WHERE itinerary.Departure = '$Departure' AND itinerary.Arrival = '$Arrival'");

    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
        $r[] = $row;
    }

    $id = $r[0]['Id'];

    $STMT=$PDO->query("INSERT INTO travel (Id, Date_Departure, Driver_user, Itin, Nb_passenger)
								VALUES ('NULL', '$Travel[0]', ' $Travel[1]', '$id', ' $Travel[2]');");

    if (!$STMT) {
        $dbError = "Impossible d'ajouter le voyage $id, $Travel[0] dans la base de données";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
        echo "<h1> Voyage rajoute dans la Base de donnees !</h1>";
}
?>
