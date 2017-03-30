<?php
include("connect.php");

if(isset($_POST['username']) && isset($_POST['pwd'])) {

    $User = array(addslashes($_POST['username']), addslashes($_POST['firstname']), addslashes($_POST['lastname']),
        addslashes($_POST['dob']), addslashes($_POST['address']), addslashes($_POST['mail']), addslashes($_POST['phone']),
        password_hash(addslashes($_POST['pwd']), PASSWORD_DEFAULT));

    $STMT=$PDO->query("INSERT INTO `users` (`Username`, `First_name`, `Last_name`, `Date_of_birth`, `Address`, `Mail`, `Phone`, `Pass_word`)
								VALUES (".$User[0].", ".$User[1].", ".$User[2].", ".$User[3].", ".$User[4].", ".$User[5].", ".$User[6].", ".$User[7].");");

    if (!$STMT) {
        $dbError = "Impossible d'ajouter l'usager $User[0], $User[5] dans la base de données";
        error_log($dbError);
        error_log($PDO -> errorInfo()[2]);
        exit(0);
    }
}
?>