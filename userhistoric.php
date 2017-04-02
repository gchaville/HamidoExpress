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
<header id="header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="images/travel-express.jpg" width="60" height="30">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Départs</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="page_member.php">Profil</a></li>
                            <li class="active"><a href="#">Historique</a></li>
                            <li><a href='editInfo.php'>Paramètres</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="scripts/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
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

            $STMT=$PDO->query("SELECT * FROM  `travel`
                          INNER JOIN  (SELECT TravelId FROM travel_supports_user WHERE UserId = '".$row['Id']."') t
                          ON travel.Id = t.TravelId 
                          INNER JOIN itinerary
                          ON travel.Itin = itinerary.Id
                          ORDER BY Date_Departure ASC;");

            $row = $STMT->fetch(PDO::FETCH_ASSOC);

                echo "<tr>
                      <th scope=\"row\">".$row['Date_Departure']."</th>
                      <td>".$row['Departure']."</td>
                      <td>".$row['Arrival']."</td>
                      <td>".$row['Price']."</td>
                      <td>".$row['Nb_passenger']."</td>
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