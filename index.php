<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HamidoExpress</title>
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

        <script>
            document.getElementById("headerDeparts").classList.add('active');
        </script>
        <!--=======content================================-->
        <section id="content">
            <form class="form-inline departure-search">
                <label class="sr-only" for="departures">Départ</label>
                <select class="form-control mb-2 mr-sm-2 mb-sm-0" id="departures" name="departure" placeholder="Ville de départ">
                </select>
                <span class="glyphicon glyphicon-chevron-right"></span></span>

                <label class="sr-only" for="arrivals">Arrivée</label>
                <select class="form-control mb-2 mr-sm-2 mb-sm-0" id="arrivals" name="arrival" placeholder="Ville d'arrivée">
                </select>
                <button type="button" class="btn btn-primary search-button">Chercher</button>

            </form>

            <br><br>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Prix</th>
                    <th>Places disponibles</th>
                </tr>
                </thead>
                <tbody class="departures">
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
