<?php
include("connect.php");

session_start ();
if (isset($_SESSION['username']) && isset($_SESSION['pwd'])) {

    $User = array(addslashes($_POST['firstname']), addslashes($_POST['lastname']),
        addslashes($_POST['dob']), addslashes($_POST['address']), addslashes($_POST['mail']), addslashes($_POST['phone']),
        password_hash(addslashes($_POST['pwd']), PASSWORD_DEFAULT));

    $Username = addslashes($_SESSION['username']);
    $Password = addslashes($_SESSION['pwd']);

    print_r($Username);

    $STMT=$PDO->query("UPDATE users
                                  SET First_name = '$User[0]', Last_name = '$User[1]', Date_of_birth = '$User[2]', Address = '$User[3]', Mail = '$User[4]', Phone = '$User[5]', Pass_word = '$User[6]'
                                  WHERE Username = '$Username';");

    print_r($User);

    if (!$STMT) {
        $dbError = "Impossible de modifier l'usager $User[0], $User[4] dans la base de données";
        error_log($dbError);
        $pdoError = $PDO -> errorInfo()[2];
        error_log($pdoError);
        echo "<h1> Erreur de modification dans la Base de donnees !</h1> <p>$dbError</p> <p>$pdoError</p>";
    }
    else
        echo "<h1> Vous avez ete modifie dans la Base de donnees !</h1>";

    header("Location:../page_member.php");
    exit();
}
?>
