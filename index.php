<?php
include_once "./Controleur/ControleurPrincipal.php";
include_once "./Modele/authentification.inc.php";
include_once "./Modele/bd.php";

connexionpdo::connexionPDO();

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include_once "./Controleur/$fichier";
?>