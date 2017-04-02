<?php
include("connect.php");

if(isset($_SESSION['username']) && isset($_SESSION['pwd'])) {

    $Username = addslashes($_SESSION['username']);
    $Password = addslashes($_SESSION['pwd']);

    $STMT=$PDO->query("SELECT *
								FROM `users`
								WHERE users.Username = '$Username'
								AND users.Pass_word = '$Password';");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>