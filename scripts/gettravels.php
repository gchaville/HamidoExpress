<?php
include("connect.php");

if(isset($_POST['departure']) && isset($_POST['arrival'])) {

    $Departure = addslashes($_POST['departure']);
    $Arrival = addslashes($_POST['arrival']);

    $STMT = $PDO->query("SELECT * FROM  `Travel`
                          INNER JOIN  (SELECT * FROM Itinerary WHERE Departure = ".$Departure." AND Arrival = ".$Arrival.") i
                          ON Travel.ItinId = i.Id
                          ORDER BY Date_Departure ASC;");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>