<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

if(!isset($_SESSION['username'])) {
    echo "Pas de compte";
    header("Location:../scripts/logout.php");
} elseif (!isset($_SESSION['driverid'])) {
    header ('location: page_member.php');
    /*echo "Pas de compte conducteur";
    echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='page_member.php'\" >Retour vers Profil</button>";
    echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='Driverinscription.php'\" >Créer un profil conducteur</button>";*/
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>HamidoExpress - Créer un nouveau voyage</title>
    <link rel='stylesheet' href='css/styles.css'>

    <script src='https://code.jquery.com/jquery-3.1.1.min.js' integrity='sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=' crossorigin='anonymous'></script>
    <script src='https://code.jquery.com/jquery-migrate-3.0.0.min.js' integrity='sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=' crossorigin='anonymous'></script>
    <!-- Latest compiled and minified CSS -->
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Optional theme -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' integrity='sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp' crossorigin='anonymous'>

    <!-- Latest compiled and minified JavaScript -->
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>

    <script src="js/index.js"></script>

</head>

<body><!--==============================header=================================-->
<?php include("header.php"); ?>
<script>
    document.getElementById("newTravel").classList.add('active');
</script>

<!--=======content================================-->
<section id="content">
    <div class="col-md-4">
        <form data-toggle="validator" role="form" class="newtravel-form" action="scripts/addtravel.php" method="post"">
            <div class='form-group'>
                <label for='inputUsername' class='control-label'>Pseudo</label>
                <input type='text' class='form-control' id='inputUsername' name='username' placeholder=<?php echo '"'.$_SESSION['username'].'"'?> disabled>
            </div>

            <div class="form-group">
                <label class="control-label" for="departures">Départ</label>
                <select class="form-control mb-2 mr-sm-2 mb-sm-0" id="departures" name="departure" placeholder="Ville de départ" required>
                </select>
            </div>
            <div class="error-search-dp bg-danger"></div>

            <div class="form-group">
                <label class="control-label" for="arrivals">Arrivée</label>
                <select class="form-control mb-2 mr-sm-2 mb-sm-0" id="arrivals" name="arrival" placeholder="Ville d'arrivée" required>
                </select>
            </div>
            <div class="error-search-ar bg-danger"></div>

            <div class="form-group">
                <label for="inputDate" class="control-label">Date de départ</label>
                <input type="date" class="form-control" id="inputDate" name="date" placeholder="AAAA-MM-JJ" required>
            </div>

            <div class="form-group">
                <label for="inputSchedule" class="control-label">Heure de départ</label>
                <input type="time" class="form-control" id="inputSchedule" name="schedule" value="08:30:00" step="600" min="06:00:00" max="22:00:00">
            </div>

            <div class="form-group">
                <label for="inputPrice" class="control-label">Prix du voyage (min: 10$, max: 100$)</label>
                    <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input type="number" class="form-control" id="inputPrice" name="price" placeholder="10" min="10" max="100" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPlacesAvailable" class="control-label">Nombre de place disponible (maximum 6)</label>
                <input type="number" class="form-control" id="inputPlacesAvailable" name="placesavailable" placeholder="0" max="6" required>
            </div>

            <input type="hidden" name="driverid" id="driveridInput" value=<?php echo '"'.$_SESSION['driverid'].'"'?>>
            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="location.href='page_member.php'" >Retour</button>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
</section>

<!--=======footer=================================-->
<footer id="footer">

</footer>
</body>
</html>