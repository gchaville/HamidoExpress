<?php
include("connect.php");

if(isset($_POST['UserId']) && isset($_POST['Password'])) {

    $Username = addslashes($_POST['UserId']);
    $Password = addslashes($_POST['Password']);

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