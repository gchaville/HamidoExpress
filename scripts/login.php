<?php
include("connect.php");

if (isset($_POST['username']) && isset($_POST['pwd'])) {

    $Username = $_POST['username'];

    $STMT=$PDO->query("SELECT Id, Pass_word From users where username = '$Username';");

    $row = $STMT->fetch(PDO::FETCH_ASSOC);

    $UserId = $row['Id'];
    $UserPWD = $row['Pass_word'];

    $STMT=$PDO->query("SELECT Id From driver where UserId = '$UserId';");

    $row = $STMT->fetch(PDO::FETCH_ASSOC);

    if (!empty($row))
        $DriverId = $row['Id'];

    if (password_verify($_POST['pwd'], $UserPWD)) {

        session_start ();

        $_SESSION['username'] = $Username;
        $_SESSION['userid'] = $UserId;
        $_SESSION['pwd'] = $UserPWD;

        if(isset($DriverId))
            $_SESSION['driverid'] = $DriverId;

        header ('location: ../page_member.php');
    }
    else {
        echo "Membre non reconnu...";
    }
}
else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>