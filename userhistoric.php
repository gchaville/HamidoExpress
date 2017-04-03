<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
if (!isset($_SESSION['username']) && !isset($_SESSION['pwd']))
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
<!--=======content================================-->
<section id="content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Date</th>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Prix</th>
            <th>Places disponibles</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // On récupère nos variables de session
        if (isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
            $Username = addslashes($_SESSION['username']);
            $Password = addslashes($_SESSION['pwd']);

            include("scripts/connect.php");

            $STMT=$PDO->query("SELECT *
								FROM `users`
								WHERE users.Username = '$Username'
								AND users.Pass_word = '$Password';");

            $row = $STMT->fetch(PDO::FETCH_ASSOC);

            $STMT = $PDO->query("SELECT * FROM  `travel`
                          INNER JOIN  (SELECT TravelId FROM travel_supports_user WHERE UserId = '".$row['Id']."') t
                          ON travel.Id = t.TravelId 
                          ORDER BY Date_Departure ASC;");

            $row = $STMT->fetch(PDO::FETCH_ASSOC);

                echo "<tr>
                      <th scope=\"row\">".$row['Date_Departure']."</th>
                      <td>".$row['DepartureId']."</td>
                      <td>".$row['ArrivalId']."</td>
                      <td>".$row['Price']."</td>
                      <td>".$row['Places_Available']."</td>
                      </tr>";
        }
        ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</section>

<!--=======footer=================================-->
<footer id="footer">

</footer>
</body>
</html>