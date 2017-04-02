<?php

if(isset($_SESSION['username'])) {

    $Username = addslashes($_SESSION['username']);

    $STMT = $PDO->query("SELECT * FROM  `travel`
                          INNER JOIN  (SELECT TravelId FROM travel_supports_user WHERE UserId = '$Username') t
                          ON travel.Id = t.TravelId 
                          INNER JOIN itinerary
                          ON travel.Itin = itinerary.Id
                          ORDER BY Date_Departure ASC;");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>

