<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

$member_page = "<DOCTYPE html>
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
    
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'post',
                url: 'scripts/getuserinfos.php',
                success: function(a) {
                    var b = $.parseJSON(a);
                    
                    $.each(b,function (a,b) {
                        $('#inputUsername').attr('value', b.Username.toString());
                    })
                }
            }) 
        })  
    </script>    

</head>

<body><!--==============================header=================================-->
<header id='header'>
    <nav class='navbar navbar-default'>
        <div class='container-fluid'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='#'>
                    <img alt='Brand' src='images/travel-express.jpg' width='60' height='30'>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav'>
                    <li><a href='#'>Accueil</a></li>
                    <li><a href='#'>Départs</a></li>
                </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Compte<span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='page_member.php'>Profil</a></li>
                            <li><a href='userhistoric.php'>Historique</a></li>
                            <li><a href='editInfo.php'>Paramètres</a></li>
                            <li role='separator' class='divider'></li>
                            <li><a href='scripts/logout.php'>Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!--=======content================================-->
<section id='content'>
    <div class='col-md-4'>
        <form data-toggle='validator' role='form' action='scripts/adddriver.php' method='post''>
        <div class='form-group'>
            <label for='inputUsername' class='control-label'>Pseudo</label>
            <input type='text' class='form-control' id='inputUsername' name='username' placeholder='Pseudo' disabled>
        </div>

        <div class='form-group'>
            <label for='drivingYear' class='control-label'>Année de conduite</label>
            <input type='text' class='form-control' id='drivingYear' name='drivingYear' placeholder='0' required>
        </div>

        <div class='form-group'>
            <label for='nbPassenger' class='control-label'>Nombre de passagers</label>
            <input type='number' class='form-control' id='nbPassenger' name='nbPassenger' placeholder='0' required>
        </div>

        <div class='form-group'>
            <label for='Smoking' class='control-label'>Auto fumeur?</label>
            <input type='checkbox' id='Smoking' name='smoking' value=1>
        </div>

        <div class='form-group'>
            <label for='airConditioning' class='control-label'>Air climatisé?</label>
            <input  type='checkbox' id='airConditioning' name='airConditioning' value=1>
        </div>

        <div class='form-group'>
            <label for='suitcase' class='control-label'>Grande valise?</label>
            <input type='checkbox' id='suitcase' name='suitcase' value=1>
        </div>

        <div class='form-group'>
            <label for='animals' class='control-label'>Animaux</label>
            <input type='checkbox' id='animals' name='animals' value=1>
        </div>

        <div class='form-group'>
            <button type='submit' class='btn btn-primary'>Envoyer</button>
        </div>
        </form>
    </div>
</section>

<!--=======footer=================================-->
<footer id='footer'>

</footer>
</body>
</html>";

// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
    echo $member_page;
} else {
    echo 'Les variables ne sont pas déclarées.';
}