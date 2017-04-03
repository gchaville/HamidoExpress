<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenue sur HamidoExpress!</title>
    <link rel="stylesheet" href="css/styles.css">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js" integrity="sha256-JklDYODbg0X+8sPiKkcFURb5z7RvlNMIaE3RA2z97vw=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
    <body>
        <!--==============================header=================================-->
        <?php include("header.php"); ?>

        <script>
            document.getElementById("headerAccueil").classList.add('active');
        </script>

        <style>

            @-webkit-keyframes Transition {
                0% {
                    opacity:1;
                }
                17% {
                    opacity:1;
                }
                25% {
                    opacity:0;
                }
                92% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            #transition {
                position:relative;
                height:281px;
                width:450px;
                margin:0 auto;
            }
            #transition img {
                position:absolute;
                left:0;
            }

            #transition img {
                -webkit-animation-name: Transition;
                -webkit-animation-timing-function: ease-in-out;
                -webkit-animation-iteration-count: infinite;
                -webkit-animation-duration: 8s;

                animation-name: Transition;
                animation-timing-function: ease-in-out;
                animation-iteration-count: infinite;
                animation-duration: 8s;
            }
            #transition img:nth-of-type(1) {
                -webkit-animation-delay: 6s;
                animation-delay: 6s;
            }
            #transition img:nth-of-type(2) {
                -webkit-animation-delay: 4s;
                animation-delay: 4s;
            }
            #transition img:nth-of-type(3) {
                -webkit-animation-delay: 2s;
                animation-delay: 2s;
            }
            #transition img:nth-of-type(4) {
                -webkit-animation-delay: 0s;
                animation-delay: 0s;
            }

            h4 {
                text-align: center;
            }

            #transition {
                align-content: center;
            }
        </style>

        <h4>Page d'accueil belle</h4>

        <div id="transition">
            <img alt="hello" src="images/voyage1.png" width="450" height="300">
            <img alt="hello" src="images/voyage2.png" width="450" height="300">
            <img alt="hello" src="images/voyage3.png" width="450" height="300">
            <img alt="hello" src="images/voyage4.png" width="450" height="300">
        </div>

        <br><br>

        <h4>Avec HamidoExpress, c'est très facile de voyager.</h4>
    </body>
</html>