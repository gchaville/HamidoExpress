<?php
include ("connect.php");

    $STMT=$PDO->query("SELECT * FROM  `town`
                    ORDER BY Name ASC;");

    $r = array();

    while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $r[] = $row;
    }

    echo json_encode($r);
?>