<?php
include("connect.php");

session_start ();
if (isset($_POST['driverid'])) {

    $UserId = addslashes($_POST['driverid']);

    $STMT=$PDO->query("SELECT *
								FROM `driver`
								WHERE driver.UserId = '$UserId';");

    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>