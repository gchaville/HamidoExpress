<?php
include("connect.php");

$STMT=$PDO->query("SELECT * FROM  `Itinerary`
                ORDER BY Date ASC;");
$r = array();

while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
{
    $r[] = $row;
}

echo json_encode($r);
?>