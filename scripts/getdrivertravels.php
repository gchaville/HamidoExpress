<?php

if(isset($_POST['username']) && isset($_SESSION['pwd'])) {

    $Username = addslashes($_SESSION['username']);
    $Password = addslashes($_SESSION['pwd']);

    $STMT=$PDO->query("SELECT *
								FROM `users`
								WHERE users.Username = '$Username'
								AND users.Pass_word = '$Password';");

    $row = $STMT->fetch(PDO::FETCH_ASSOC);

    $STMT = $PDO->query("SELECT * FROM  `Travel`
                          INNER JOIN  (SELECT Id FROM Driver WHERE UserId = '".$row['Id']."') d
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

