<?php
include("connect.php");

if(isset($_POST['departure']) && isset($_POST['arrival'])) {

    $Departure = addslashes($_POST['departure']);
    $Arrival = addslashes($_POST['arrival']);

    $STMT = $PDO->query("SELECT * FROM  `travel`
                          WHERE DepartureId = '$Departure' AND ArrivalId = '$Arrival'
                          ORDER BY Date ASC;");
    $r = array();

    $today = date('Y-m-d');

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
        if($today < $row['Date']) {
            $time = date_format(date_create($row['Schedule']), 'g:i A');
            $row['Schedule'] = $time;

            $DRIVER=$PDO->query("SELECT Smoking, Air_Conditioning, Large_suicase, Animals FROM `driver` 
                                WHERE Id = ".$row['DriverId'].";");

            $row = array_merge($row, $DRIVER->fetch(PDO::FETCH_ASSOC));

            $r[] = $row;
        }
    }

    echo json_encode($r);
}
?>