<?php

function controleurPrincipal($action) {
    $lesActions = array();
    
    $lesActions["defaut"] = "Connexion.php";
    $lesActions["accueil"] = "Accueil.php";
    $lesActions["connexion"] = "Connexion.php";
    $lesActions["MonProfil"] = "MonProfil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "MonProfil.php";

    $lesActions["Rapports"] = "Rapport.php";

    $lesActions["Medecins"] = "Medecins.php";
    


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    }
    else {
        return $lesActions["defaut"];
    }
}
?>