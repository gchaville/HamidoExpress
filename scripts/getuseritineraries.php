<?php

if(isset($_POST['UserId']) && isset($_POST['ItineraryId'])) {

    $Username = addslashes($_POST['UserId']);
    $ItineraryID = addslashes($_POST['ItineraryId']);

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

