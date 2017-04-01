<?php
include("connect.php");

if(isset($_POST['username']) && isset($_POST['pwd'])) {

    $User = array(addslashes($_POST['username']), addslashes($_POST['firstname']), addslashes($_POST['lastname']),
        addslashes($_POST['dob']), addslashes($_POST['address']), addslashes($_POST['mail']), addslashes($_POST['phone']),
        password_hash(addslashes($_POST['pwd']), PASSWORD_DEFAULT));


    $STMT=$PDO->query("INSERT INTO users (Username, First_name, Last_name, Date_of_birth, Address, Mail, Phone, Pass_word)
								VALUES ('$User[0]', '$User[1]', '$User[2]', '$User[3]', '$User[4]', '$User[5]', '$User[6]', '$User[7]');");

    print_r($User);
    if (!$STMT) {
        $dbError = "Impossible d'ajouter l'usager $User[0], $User[5] dans la base de données";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur d'insertion dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
        echo "<h1> Vous avez ete rajoute dans la Base de donnees !</h1>";
}
?>