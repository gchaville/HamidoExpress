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
                    <li id="headerAccueil"><a href="accueil.php">Accueil</a></li>
                    <?php if(isset($_SESSION['username']))
                        echo '<li id="headerDeparts"><a href="index.php">Départs</a></li>'?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        $rightnav = "";
                        if(isset($_SESSION['username']))
                        {
                            if (!isset($_SESSION['driverid']))
                                $rightnav .= '<li id="driverInscription"><a href="Driverinscription.php">Devenir conducteur</a></li>';
                            else
                                $rightnav .= '<li id="driverInscription"><a href="Driverinscription.php">Configurer conducteur</a></li>
                                              <li id="newTravel"><a href="newtravel.php">Nouveau voyage</a></li>';

                            $rightnav .= '<li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li id="headerProfil"><a href="page_member.php">Profil</a></li>
                                                <li id="headerHistoricPassenger"><a href="userhistoric.php">Voyages - Passager</a></li>';

                            if (isset($_SESSION['driverid']))
                                $rightnav .='   <li id="headerHistoricDriver"><a href="driverHistoric.php">Voyages - Conducteur</a></li>';

                            $rightnav .=       '<li id="headerParametres"><a href="editInfo.php">Paramètres</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="scripts/logout.php">Déconnexion</a></li>
                                            </ul>
                                        </li>';
                        }
                        else {
                            $rightnav = '<li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connexion<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <form class="navbar-form navbar-left" action="scripts/login.php" method="post">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="username" placeholder="Nom d\'utilisateur">
                                                        <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" minlength="6">
                                                    </div>
                                                    <input type="submit" class="btn btn-default" value="Se connecter">
                                                </form>
                                            </ul>
                                        </li>
                                        <li id="headerInscription"><a href="inscription.php">Inscription</a></li>';
                        }
                        echo $rightnav;
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>