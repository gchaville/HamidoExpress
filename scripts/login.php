<?php
include("connect.php");
$login_valide = "test";
$pwd_valide = "testtest";

if (isset($_POST['username']) && isset($_POST['pwd'])) {

    $STMT=$PDO->query("SELECT Pass_word From users where username = '".$_POST['username']."'");

    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
        $r[] = $row;
    }

    $pw = $r[0]['Pass_word'];

    print_r($r);

    echo $pw;

    if (password_verify($_POST['pwd'], $pw)) {

        session_start ();

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pwd'] = $pw;

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