<?php
include("connect.php");
session_start();

if(isset($_SESSION['userid']) && isset($_SESSION['driverid'])) {
    $DriverId = addslashes($_SESSION['driverid']);

    $Travel = array($DriverId, addslashes($_POST['departure']), addslashes($_POST['arrival']), addslashes($_POST['Date']),
        addslashes($_POST['Price']), addslashes($_POST['Places_Available']));

    print_r($Travel);

    $STMT=$PDO->query("INSERT INTO travel (Id, DriverId, DepartureId, ArrivalId, Date, Price, Places_Available)
								VALUES (NULL, '$Travel[0]', '$Travel[1]', '$Travel[2]', '$Travel[3]', '$Travel[4]', '$Travel[5]');");

    if (!$STMT) {
        $dbError = "Impossible d'ajouter votre voyage, $Travel[0], dans la base de données";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
    {
        echo "<h1> Voyage rajoute dans la Base de donnees !</h1>";
        header("Location:../page_member.php");
    }

}
?>
