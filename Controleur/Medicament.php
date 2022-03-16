<?php 

include "./Vue/boot.html.php";
include "./Vue/vueMedecins.php";
include "./Modele/daomedicament.php";

$listeMedicaments=daomedicaments::getMedicaments();

?>