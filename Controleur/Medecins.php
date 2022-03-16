<?php 

include_once "./Modele/daomedecins.php";
include_once "./Modele/medecins.php";
include_once "./Modele/authentification.inc.php";

$type = $_GET["type"];
if(isset($tableau['type'])){
    echo $tableau['type'];
}

if ($type=="Medecins") {
    $listeMedecins=daomedecins::getMedecins();
    $rechercheMedecins=array();

    include "./Vue/boot.html.php";
    include "./Vue/vueMedecins.php";
}

elseif ($type=="ModifierMedecin") {
    $Err="";
    $medecin=daoMedecins::ChargeMedecinbyId($_GET["id"]);

    include "./Vue/boot.html.php";
    include "./Vue/vueModifierMedecin.php";
}

elseif ($type=="RechercheMedecin"){
    if(isset($_POST["nom"])){
        $nom=$_POST["nom"];
        $rechercheMedecins=daomedecins::RechercheMedecinByName($nom);
    }
    
    $listeMedecins=array();
    include "./Vue/boot.html.php";
    include "./Vue/vueMedecins.php";
}

elseif ($type=="EnregModMedecin") {
    if($_POST["adresse"] != "" && $_POST["tel"] != ""){
        $Modmedecin=daomedecins::UpdateMedecin($_POST["id"], $_POST["adresse"], $_POST["tel"]);
        include "./Vue/boot.html.php";
        include "./Vue/vueEnregModMedecin.php";
    }else{
        $medecin=daomedecins::getMedecinbyId($id);
        $Err="Ne laissez aucun champ vide !";
        include "./Vue/boot.html.php";
        include "./Vue/vueModifierMedecin.php";
    }
}
elseif ($type=="EnregMedecin") {
    include "./Vue/boot.html.php";
    $medecin=daomedecins::RechercheMedecinByNamePres($_POST["name"]);
    $Err="";
    print($medecin);
    print(count($medecin));

    include "./Vue/vueEnregMedecin.php";
}
?>