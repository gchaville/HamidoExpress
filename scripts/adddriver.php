<?php
include("connect.php");

//if(isset($_SESSION['username'])) {
    $Driver = array(addslashes($_POST['username']), addslashes($_POST['drivingYear']), addslashes($_POST['nbPassenger']),
        addslashes($_POST['smoking']), addslashes($_POST['airConditioning']), addslashes($_POST['suitcase']), addslashes($_POST['animals']));

    print_r($Driver);

    //if ($Driver[3] = '1')
        //;
    
    $STMT=$PDO->query("INSERT INTO driver (Id, Username, Driving_Year, Nb_passenger_total, Smoking, Air_Conditioning, Large_suicase, Animals)
								VALUES (NULL, '$Driver[0]', '$Driver[1]', '$Driver[2]', '$Driver[3]', '$Driver[4]', '$Driver[5]', '$Driver[6]');");
    $STMT=$PDO->query("UPDATE driver
                                  SET Driving_Year = '$Driver[1]', Nb_passenger_total = '$Driver[2]', Smoking = '$Driver[3]', Air_Conditioning = '$Driver[4]', Large_suicase = '$Driver[5]', Animals = '$Driver[6]'
                                  WHERE Username = '$Username';");

    if (!$STMT) {
        $dbError = "Impossible d'ajouter l'usager $Driver[0] dans la base de données";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
        echo "<h1> Vous avez ete rajoute dans la Base de donnees !</h1>";
//}
?>