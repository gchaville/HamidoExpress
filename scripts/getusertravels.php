<?php

if(isset($_SESSION['username']) && isset($_SESSION['pwd'])) {

    $Username = addslashes($_SESSION['username']);
    $Password = addslashes($_SESSION['pwd']);

    $STMT=$PDO->query("SELECT *
								FROM `users`
								WHERE users.Username = '$Username'
								AND users.Pass_word = '$Password';");

    $row = $STMT->fetch(PDO::FETCH_ASSOC);

    $STMT = $PDO->query("SELECT * FROM  `travel`
                          INNER JOIN  (SELECT TravelId FROM travel_supports_user WHERE UserId = '".$row['Id']."') t
                          ON travel.Id = t.TravelId 
                          ORDER BY Date_Departure ASC;");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>

