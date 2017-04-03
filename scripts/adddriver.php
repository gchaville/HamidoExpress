<?php
include("connect.php");

session_start ();

if (isset($_SESSION['username'])) {
    $Username = addslashes($_SESSION['username']);
    $UserId = addslashes($_SESSION['userid']);
    $Password = addslashes($_SESSION['pwd']);

    if (!isset($_SESSION['driverid']))
    {
        $Driver = array($UserId, addslashes($_POST['drivingYear']), addslashes($_POST['nbPassenger']),
            addslashes($_POST['smoking']), addslashes($_POST['airConditioning']), addslashes($_POST['suitcase']), addslashes($_POST['animals']));

        if ($Driver[3] != 1)
            $Driver[3] = 0;
        if ($Driver[4] != 1)
            $Driver[4] = 0;
        if ($Driver[5] != 1)
            $Driver[5] = 0;
        if ($Driver[6] != 1)
            $Driver[6] = 0;

        $STMT = $PDO->query("INSERT INTO driver (Id, UserId, Driving_Year, Passenger_Total, Smoking, 
                            Air_Conditioning, Large_suicase, Animals, Cancelling, Banning_Date)
                            VALUES (NULL, '$Driver[0]', '$Driver[1]', '$Driver[2]', '$Driver[3]', '$Driver[4]', 
                            '$Driver[5]', '$Driver[6]', 0, NULL);");

        if (!$STMT) {
            $dbError = "Impossible d'ajouter l'usager $Username dans la base de données";
            error_log($dbError);
            $pdoError = $PDO->errorInfo()[2];
            error_log($pdoError);
            echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
        } else {
            $STMT = $PDO->query("SELECT Id FROM driver WHERE UserID = '$UserId';");

            $row = $STMT->fetch(PDO::FETCH_ASSOC);

            $_SESSION['driverid'] = $row['Id'];
            echo "<h1> Vous avez ete rajoute dans la Base de donnees !</h1>";
            header("Location:../page_member.php");
        }

    } else {
        $STMT = $PDO->query("UPDATE driver
                                  SET Driving_Year = '$Driver[1]', Passenger_Total = '$Driver[2]', Smoking = '$Driver[3]', 
                                      Air_Conditioning = '$Driver[4]', Large_suicase = '$Driver[5]', Animals = '$Driver[6]'
                                  WHERE UserId = '$Driver[0]';");

        if (!$STMT) {
            $dbError = "Impossible d'ajouter l'usager $Username dans la base de données";
            error_log($dbError);
            $pdoError = $PDO->errorInfo()[2];
            error_log($pdoError);
            echo "<h1> Erreur de mise à jour dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
        } else {
            echo "<h1> Vous avez ete mis à jour dans la Base de donnees !</h1>";
            header("Location:../page_member.php");
        }
    }
}
else
    header("Location:../scripts/logout.php");
//}
?>