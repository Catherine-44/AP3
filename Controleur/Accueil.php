<?php

include_once "./modele/authentification.inc.php";
include "./Vue/boot.html.php";
if (daoauthentification::isLoggedOn()){
     include "./Vue/vueAccueil.php";
     }
 else {
     include "./Vue/vueConnexion.php";
 }

?>