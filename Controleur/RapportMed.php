<?php

include "./Modele/daomedicament.php";
include_once "./modele/daorapport.php";

$listeMedicaments=daomedicaments::getMedicaments();

if (daoauthentification::isLoggedOn()){
    include "./Vue/boot.html.php";
    include "./Vue/vueRapportMed.php";
}