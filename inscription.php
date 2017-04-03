<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HamidoExpress - Inscription</title>
        <link rel="stylesheet" href="css/styles.css">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js" integrity="sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>

    <body><!--==============================header=================================-->
    <?php include("header.php"); ?>

    <script>
        document.getElementById("headerInscription").classList.add('active');
    </script>
        <!--=======content================================-->
        <section id="content">
            <div class="col-md-4">
                <form data-toggle="validator" role="form" action="scripts/adduser.php" method="post"">
                    <div class="form-group">
                        <label for="inputFirstName" class="control-label">Prénom</label>
                        <input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="Prénom" required>
                    </div>

                    <div class="form-group">
                        <label for="inputLastName" class="control-label">Nom</label>
                        <input type="text" class="form-control" id="inputLastName" name="lastname" placeholder="Nom" required>
                    </div>

                    <div class="form-group">
                        <label for="inputDOB" class="control-label">Date de naissance (majeur seulement)</label>
                        <input type="date" class="form-control" id="inputDOB" name="dob" placeholder="AAAA-MM-JJ" data-error="Entrez une date de naissance valide!" max="1999-01-01" required>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Courriel</label>
                        <input type="email" class="form-control" id="inputEmail" name="mail" placeholder="exemple@gmail.com" data-error="Entrez une adresse électronique valide!" required>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress" class="control-label">Adresse</label>
                        <textarea class="form-control" rows="5" id="inputAddress" name="address" data-error="Entrez une adresse valide!" placeholder="#, rue
                        ville, province
                        code postale"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="inputPhone" class="control-label">Numéro de téléphone</label>
                        <input type="text" pattern="^\d{3}-?\d{3}-?\d{4}$" class="form-control" id="inputPhone" name="phone" placeholder="555-555-5555" required>
                    </div>

                    <div class="form-group">
                        <label for="inputUsername" class="control-label">Nom d'utilisateur</label>
                        <input type="text" pattern="^[_A-z0-9]{6,}$" maxlength="20" class="form-control" id="inputUsername" name="username" placeholder="Nom d'utilisateur" required>
                        <div class="help-block with-errors">Le nom doit contenir de 6 à 20 caractères (a-z, 0-9).</div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Mot de passe</label>
                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="pwd" placeholder="Mot de passe" required>
                        <div class="help-block with-errors">Le mot de passe doit contenir au moins 6 caractères.</div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="location.href='accueil.php'" >Retour</button>
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