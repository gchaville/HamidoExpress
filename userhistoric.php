<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
if (!isset($_SESSION['userid']) && !isset($_SESSION['pwd']))
{
    header ('location: scripts/logout.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HamidoExpress - Historique</title>
        <link rel="stylesheet" href="css/styles.css">
    
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js" integrity="sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="js/index.js"></script>
    </head>

<body>
<!--==============================header=================================-->
<?php include("header.php"); ?>

<script>
    document.getElementById("headerHistorique").classList.add('active');
</script>
<!--=======content================================-->
<section id="content">
    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Horaire</th>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Prix</th>
            <th>Places disponibles</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // On récupère nos variables de session
            $UserId = addslashes($_SESSION['userid']);

            include("scripts/connect.php");

            $STMT = $PDO->query("SELECT * FROM  `travel`
                          INNER JOIN  (SELECT TravelId FROM travel_supports_user WHERE UserId = '$UserId') t
                          ON travel.Id = t.TravelId 
                          ORDER BY Date ASC;");

            $today = date('Y-m-d');

            while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
                $VOY = $PDO->query("SELECT `Name` FROM  `town`
                                          WHERE town.Id =  '$row[DepartureId]';");
                $dep = $VOY->fetch(PDO::FETCH_ASSOC);
                $VOY = $PDO->query("SELECT `Name` FROM  `town`
                                          WHERE town.Id =  '$row[ArrivalId]';");
                $arr = $VOY->fetch(PDO::FETCH_ASSOC);

                $travelDate = $row['Date'];
                $time = date_format(date_create($row['Schedule']), 'g:i A');
                $today > $travelDate ? $tableTr = "<tr class=\"active useless\">" : $tableTr = "<tr>";

                $tableTr .="<th scope=\"row\">$travelDate</th>
                            <td>$time</td>
                            <td>".$dep['Name']."</td>
                            <td>".$arr['Name']."</td>
                            <td>" . $row['Price'] . "</td>
                            <td>" . $row['Places_Available'] . "</td>";

                if ( $today < $travelDate) {
                    if ($row['Places_Available'] > 0)
                        $tableTr .= "<td><button type=\"button\" id=\"" . $row['Id'] . "\" class=\"btn btn-primary booking-button\">Réserver</button></td>";

                    $tableTr .= "<td><button type=\"button\" id=\"" . $row['Id'] . "\" class=\"btn btn-primary cancel-booking-button\">Annuler</button></td>";
                }

                $tableTr .="</tr>";
                echo $tableTr;
            }
        ?>
        </tbody>
    </table>
</section>

<!--=======footer=================================-->
<footer id="footer">

</footer>
</body>
</html>