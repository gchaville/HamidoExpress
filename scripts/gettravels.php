<?php
include("connect.php");

if(isset($_POST['departure']) && isset($_POST['arrival'])) {

    $Departure = addslashes($_POST['departure']);
    $Arrival = addslashes($_POST['arrival']);

    $STMT = $PDO->query("SELECT * FROM  `travel`
                          INNER JOIN  itinerary
                          ON travel.Itin = itinerary.Id
                          WHERE itinerary.Departure = '$Departure' AND itinerary.Arrival = '$Arrival'
                          ORDER BY Date_Departure ASC;");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>