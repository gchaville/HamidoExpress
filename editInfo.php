<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

$member_page = "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <title>HamidoExpress - Modification</title>
        <link rel=\"stylesheet\" href=\"css/styles.css\">

        <script src=\"https://code.jquery.com/jquery-3.1.1.min.js\" integrity=\"sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=\" crossorigin=\"anonymous\"></script>
        <script src=\"https://code.jquery.com/jquery-migrate-3.0.0.min.js\" integrity=\"sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=\" crossorigin=\"anonymous\"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">

        <!-- Optional theme -->
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css\" integrity=\"sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp\" crossorigin=\"anonymous\">

        <!-- Latest compiled and minified JavaScript -->
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>

        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'post',
                    url: 'scripts/getuserinfos.php',
                    success: function(a) {
                        var b = $.parseJSON(a);
                        
                        $.each(b,function (a,b) {
                            $('#inputFirstName').attr('value', b.First_name.toString());
                            $('#inputLastName').attr('value', b.Last_name.toString());
                            $('#inputDOB').attr('value', b.Date_of_birth);
                            $('#inputEmail').attr('value', b.Mail);
                            document.getElementById('inputAddress').value =  b.Address;
                            $('#inputPhone').attr('value', b.Phone.toString());
                        })
                    }
                }) 
            })  
        </script>
    </head>

    <body><!--==============================header=================================-->
        <header id=\"header\">
            <nav class=\"navbar navbar-default\">
                <div class=\"container-fluid\">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class=\"navbar-header\">
                        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                        <a class=\"navbar-brand\" href=\"#\">
                            <img alt=\"Brand\" src=\"images/travel-express.jpg\" width=\"60\" height=\"30\">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                        <ul class=\"nav navbar-nav\">
                            <li><a href=\"#\">Accueil</a></li>
                            <li><a href=\"#\">Départs</a></li>
                        </ul>
                        <ul class=\"nav navbar-nav navbar-right\">
                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Compte<span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"page_member.php\">Profil</a></li>
                                    <li><a href=\"userhistoric.php\">Historique</a></li>
                                    <li class='active'><a href=\"#\">Paramètres</a></li>
                                    <li role=\"separator\" class=\"divider\"></li>
                                    <li><a href=\"scripts/logout.php\">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!--=======content================================-->
        <section id=\"content\">
            <div class=\"col-md-4\">
                <form data-toggle=\"validator\" role=\"form\" action='scripts/editUser.php' method='post'>
                    <div class=\"form-group\">
                        <label for=\"inputFirstName\" class=\"control-label\">Prémon</label>
                        <input type=\"text\" class=\"form-control\" id=\"inputFirstName\" name='firstname'>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"inputLastName\" class=\"control-label\">Nom</label>
                        <input type=\"text\" class=\"form-control\" id=\"inputLastName\" name='lastname'>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"inputDOB\" class=\"control-label\">Date de naissance (majeur seulement)</label>
                        <input type=\"date\" class=\"form-control\" id=\"inputDOB\" name='dob' data-error=\"Entrez une date de naissance valide!\" max=\"1999-01-01\">
                    </div>

                    <div class=\"form-group\">
                        <label for=\"inputEmail\" class=\"control-label\">Courriel</label>
                        <input type=\"email\" class=\"form-control\" id=\"inputEmail\" name='mail' data-error=\"Entrez une adresse électronique valide!\">
                    </div>

                    <div class=\"form-group\">
                        <label for=\"inputAddress\" class=\"control-label\">Adresse</label>
                        <textarea class=\"form-control\" rows=\"5\" id=\"inputAddress\"name='address'></textarea>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"inputPhone\" class=\"control-label\">Numéro de téléphone</label>
                        <input type=\"text\" pattern=\"^\d{3}-?\d{3}-?\d{4}$\" class=\"form-control\" id=\"inputPhone\" name='phone'>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"inputPassword\" class=\"control-label\">Mot de passe</label>
                        <input type=\"password\" data-minlength=\"6\" class=\"form-control\" id=\"inputPassword\" name='pwd'>
                        <div class=\"help-block with-errors\">Le mot de passe doit contenir au moins 6 caractères.</div>
                    </div>

                    <div class=\"form-group\">
                        <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='page_member.php'\" >Retour</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button>  
                    </div>
                </form>
            </div>
        </section>

        <!--=======footer=================================-->
        <footer id=\"footer\">

        </footer>
    </body>
</html>";

// On récupère nos variables de session
if (isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
    echo $member_page;
} else {
    echo 'Les variables ne sont pas déclarées.';
}