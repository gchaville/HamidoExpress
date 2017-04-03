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
                    <li><a href="accueil.php">Accueil</a></li>
                    <?php if(isset($_SESSION['username']))
                        echo '<li><a href="index.php">Départs</a></li>'?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['username']))
                        echo '<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="page_member.php">Profil</a></li>
                                            <li><a href="userhistoric.php">Historique</a></li>
                                            <li><a href="editInfo.php">Paramètres</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="scripts/logout.php">Déconnexion</a></li>
                                        </ul>
                                    </li>';
                    else
                        echo '<li class="dropdown">
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
                                    <li><a href="inscription.php">Inscription</a></li>';
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>