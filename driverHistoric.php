<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
if (!isset($_SESSION['username']))
    header ('location: scripts/logout.php');
elseif (!isset($_SESSION['driverid']))
    header ('location: page_member.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HamidoExpress - Historique de voyages</title>
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

<?php include("header.php"); ?>

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
        </tr>
        </thead>
        <tbody>
        <?php
        // On récupère nos variables de session
            $DriverId = addslashes($_SESSION['driverid']);

            include("scripts/connect.php");

            $STMT = $PDO->query("SELECT * FROM  `travel`
                                          WHERE DriverId =  '$DriverId';");

            $today = date('Y-m-d');

            while ($row = $STMT->fetch(PDO::FETCH_ASSOC))
            {
                $VOY = $PDO->query("SELECT `Name` FROM  `town`
                                          WHERE town.Id =  '$row[DepartureId]';");
                $dep = $VOY->fetch(PDO::FETCH_ASSOC);
                $VOY = $PDO->query("SELECT `Name` FROM  `town`
                                          WHERE town.Id =  '$row[ArrivalId]';");
                $arr = $VOY->fetch(PDO::FETCH_ASSOC);

                $travelDate = $row['Date'];
                $time = date_format(date_create($row['Schedule']), 'g:i A');
                $today > $travelDate ? $tableTr = "<tr class=\"active useless\">" : $tableTr = "<tr>";

                $tableTr .= "<th scope=\"row\">$travelDate</th>
                             <td>$time</td>
                             <td>".$dep['Name']."</td>
                             <td>".$arr['Name']."</td>
                             <td>".$row['Price']."</td>
                             <td>".$row['Places_Available']."</td>";

                if ( $today < $travelDate)
                    $tableTr .= "<td><button type=\"button\" id=\"".$row['Id']."\" class=\"btn btn-primary cancel-travel-button\">Annuler</button></td>";
              
                $tableTr .= "</tr>";

                echo $tableTr;
            }
        ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" onclick="location.href='page_member.php'" >Retour</button>
</section>

<!--=======footer=================================-->
<footer id="footer">

</footer>
</body>
</html>