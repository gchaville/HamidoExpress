<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

if(!isset($_SESSION['username'])) {
    echo "Pas de compte";
    header("Location:../scripts/logout.php");
}
?>

<DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>HamidoExpress - Inscription conducteur</title>
    <link rel='stylesheet' href='css/styles.css'>

    <script src='https://code.jquery.com/jquery-3.1.1.min.js' integrity='sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=' crossorigin='anonymous'></script>
    <script src='https://code.jquery.com/jquery-migrate-3.0.0.min.js' integrity='sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=' crossorigin='anonymous'></script>
    <!-- Latest compiled and minified CSS -->
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Optional theme -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' integrity='sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp' crossorigin='anonymous'>

    <!-- Latest compiled and minified JavaScript -->
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>

</head>

<body><!--==============================header=================================-->
<?php include("header.php"); ?>
<!--=======content================================-->
<section id='content'>
    <div class='col-md-4'>
        <form data-toggle='validator' role='form' action='scripts/adddriver.php' method='post''>
        <div class='form-group'>
            <label for='inputUsername' class='control-label'>Pseudo</label>
            <input type='text' class='form-control' id='inputUsername' name='username' placeholder=<?php echo '"'.$_SESSION['username'].'"'?> disabled>
        </div>

        <div class='form-group'>
            <label for='drivingYearInput' class='control-label'>Année de conduite</label>
            <input type='text' class='form-control' id='drivingYearInput' name='drivingYear' placeholder='0' required>
        </div>

        <div class='form-group'>
            <label for='nbPassengerInput' class='control-label'>Nombre de passagers</label>
            <input type='number' class='form-control' id='nbPassengerInput' name='nbPassenger' placeholder='0' required>
        </div>

        <div class='form-group'>
            <label for='SmokingInput' class='control-label'>Auto fumeur?</label>
            <input type='checkbox' id='SmokingInput' name='smoking' value=1>
        </div>

        <div class='form-group'>
            <label for='airConditioningInput' class='control-label'>Air climatisé?</label>
            <input  type='checkbox' id='airConditioningInput' name='airConditioning' value=1>
        </div>

        <div class='form-group'>
            <label for='suitCaseInput' class='control-label'>Grande valise?</label>
            <input type='checkbox' id='suitCaseInput' name='suitcase' value=1>
        </div>

        <div class='form-group'>
            <label for='animalsInput' class='control-label'>Animaux</label>
            <input type='checkbox' id='animalsInput' name='animals' value=1>
        </div>

        <div class='form-group'>
            <button type="button" class="btn btn-primary" onclick="location.href='page_member.php'" >Retour</button>
            <button type='submit' class='btn btn-primary'>Envoyer</button>
        </div>
        </form>
    </div>
</section>

<!--=======footer=================================-->
<footer id='footer'>

</footer>
</body>
</html>