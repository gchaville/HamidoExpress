<?php
include("connect.php");

if(isset($_POST['username']) && isset($_POST['pwd'])) {

    $Username = addslashes($_POST['username']);
    $Password = password_hash(addslashes($_POST['pwd']), PASSWORD_DEFAULT);

    $STMT=$PDO->query("SELECT *
								FROM `Users`
								WHERE Users.Username = ".$Username."
								AND Users.Pass_word = ".$Password.")");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>