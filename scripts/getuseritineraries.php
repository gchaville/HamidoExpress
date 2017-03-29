<?php

if(isset($_POST['username']) && isset($_POST['itinerary'])) {

    $Username = addslashes($_POST['username']);
    $ItineraryID = addslashes($_POST['itinerary']);

    $STMT=$PDO->query("SELECT *
								FROM `Itinerary_supports_User`
								WHERE `Itinerary_supports_User`.UserID = ".$Username."
								AND `Itinerary_supports_User`.ItineraryID = ".$ItineraryID.")");
    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
}
?>

