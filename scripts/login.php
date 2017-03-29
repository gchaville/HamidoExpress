<?php
$login_valide = "test";
$pwd_valide = "testtest";

if (isset($_POST['username']) && isset($_POST['pwd'])) {

    if ($login_valide == $_POST['username'] && $pwd_valide == $_POST['pwd']) {

        session_start ();

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pwd'] = $_POST['pwd'];

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