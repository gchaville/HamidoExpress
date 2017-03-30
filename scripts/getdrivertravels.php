<?php

if(isset($_POST['username'])) {

    $Username = addslashes($_POST['username']);

    $STMT = $PDO->query("SELECT * FROM  `Travel`
                          INNER JOIN  (SELECT Id FROM Driver WHERE Username = ".$Username.") d
                          ON Travel.DriverId = d.Id
                          ORDER BY Date_Departure ASC;");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>

