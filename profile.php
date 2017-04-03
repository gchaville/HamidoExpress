<?php
// On récupère nos variables de session
if (!isset($_SESSION['username']) && !isset($_SESSION['pwd']))
    header ('location: scripts/logout.php');
?>

<div class="col-xs-6">
    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['pwd'])) {
    $Username = addslashes($_SESSION['username']);
    $Password = addslashes($_SESSION['pwd']);

    include("scripts/connect.php");

    $STMT=$PDO->query("SELECT * FROM `users` WHERE Username = '$Username' AND Pass_word = '$Password';");

    $row = $STMT->fetch(PDO::FETCH_ASSOC);
    }

    echo "<div class=\"panel panel-default\">
            <div class=\"panel-heading\" data-toggle=\"collapse\" data-target=\"#passenger\">
                <span class=\"glyphicon glyphicon-chevron-right\"></span> Profil Passager
            </div>
            <div id=\"passenger\" class=\"panel-body\">
                <ul class=\"list-group\">
                    <label class=\"control-label\">Nom d'utilisateur :</label>
                    <li class=\"list-group-item\">".$row['Username']."</li>
                      
                    <label class=\"control-label\">Prénom :</label>
                    <li class=\"list-group-item\">".$row['First_name']."</li>
            
                    <label class=\"control-label\">Nom :</label>
                    <li class=\"list-group-item\">".$row['Last_name']."</li>
            
                    <label class=\"control-label\">Date de naissance :</label>
                    <li class=\"list-group-item\">". $row['Date_of_birth']."</li>
            
                    <label class=\"control-label\">Adresse postale :</label>
                    <li class=\"list-group-item\">".$row['Address']."</li>
            
                    <label class=\"control-label\">Adresse courriel :</label>
                    <li class=\"list-group-item\">".$row['Mail']."</li>
            
                    <label class=\"control-label\">Téléphone :</label>
                    <li class=\"list-group-item\">".$row['Phone']."</li>
                </ul>
            </div>
          </div>
    </div>";

    if (isset($_SESSION['driverid'])) {
        $STMT=$PDO->query("SELECT * FROM `driver` WHERE driver.Id = '".$_SESSION['driverid']."';");

        $row = $STMT->fetch(PDO::FETCH_ASSOC);

        $Preferences = array();
        $row['Smoking'] ? $Preferences[0] = "Oui" : $Preferences[0] = "Non";
        $row['Air_Conditioning'] ? $Preferences[1] = "Oui" : $Preferences[1] = "Non";
        $row['Large_suicase'] ? $Preferences[2] = "Oui" : $Preferences[2] = "Non";
        $row['Animals'] ? $Preferences[3] = "Oui" : $Preferences[3] = "Non";

        echo "<div class=\"col-xs-6\">
              <div class=\"panel panel-default\">
                <div class=\"panel-heading\" data-toggle=\"collapse\" data-target=\"#driver\">
                    <span class=\"glyphicon glyphicon-chevron-right\"></span> Profil Conducteur
                </div>
                <div id=\"driver\" class=\"panel-body\">
                    <ul class=\"list-group\">
                        <label class=\"control-label\">Année de conduite :</label>
                        <li class=\"list-group-item\">".$row['Driving_Year']."</li>
                        
                        <label class=\"control-label\">Nombre de passagers transportés :</label>
                        <li class=\"list-group-item\">".$row['Passenger_Total']."</li>
                        
                        <label class=\"control-label\">Auto fumeur :</label>
                        <li class=\"list-group-item\">".$Preferences[0]."</li>
                        
                        <label class=\"control-label\">Air climatisée :</label>
                        <li class=\"list-group-item\">".$Preferences[1]."</li>
                        
                        <label class=\"control-label\">Grande valise :</label>
                        <li class=\"list-group-item\">".$Preferences[2]."</li>
                        
                        <label class=\"control-label\">Animaux :</label>
                        <li class=\"list-group-item\">".$Preferences[1]."</li>
                    </ul>
                </div>
              </div>";
    }
    ?>
</div>

