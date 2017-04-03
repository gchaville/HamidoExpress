<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
if (!isset($_SESSION['username']) && !isset($_SESSION['pwd']))
{
    header ('location: scripts/logout.php');
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HamidoExpress - Modification</title>
        <link rel="stylesheet" href="css/styles.css">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js" integrity="sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
        <?php include("header.php"); ?>

        <script>
            document.getElementById("headerParametres").classList.add('active');
        </script>
        <!--=======content================================-->
        <section id="content">
            <div class="col-md-4">
                <form data-toggle="validator" role="form" action='scripts/editUser.php' method='post'>
                    <div class="form-group">
                        <label for="inputFirstName" class="control-label">Prémon</label>
                        <input type="text" class="form-control" id="inputFirstName" name='firstname'>
                    </div>

                    <div class="form-group">
                        <label for="inputLastName" class="control-label">Nom</label>
                        <input type="text" class="form-control" id="inputLastName" name='lastname'>
                    </div>

                    <div class="form-group">
                        <label for="inputDOB" class="control-label">Date de naissance (majeur seulement)</label>
                        <input type="date" class="form-control" id="inputDOB" name='dob' data-error="Entrez une date de naissance valide!" max="1999-01-01">
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Courriel</label>
                        <input type="email" class="form-control" id="inputEmail" name='mail' data-error="Entrez une adresse électronique valide!">
                    </div>

                    <div class="form-group">
                        <label for="inputAddress" class="control-label">Adresse</label>
                        <textarea class="form-control" rows="5" id="inputAddress"name='address'></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputPhone" class="control-label">Numéro de téléphone</label>
                        <input type="text" pattern="^\d{3}-?\d{3}-?\d{4}$" class="form-control" id="inputPhone" name='phone'>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="location.href='page_member.php'" >Retour</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>  
                    </div>
                </form>
            </div>
        </section>

        <!--=======footer=================================-->
        <footer id="footer">

        </footer>
    </body>
</html>