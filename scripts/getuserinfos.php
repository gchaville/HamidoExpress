<?php
include("connect.php");

if(isset($_POST['username']) && isset($_POST['pwd'])) {

    $Username = addslashes($_POST['username']);
    $Password = addslashes($_POST['pwd']);

    $STMT=$PDO->query("SELECT *
								FROM `User`
								WHERE `User`.UserID = ".$Username."
								AND `User`.Password = ".$Password.")");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>