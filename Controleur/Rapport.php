<?php

include_once "./Modele/authentification.inc.php";
include_once "./Modele/daomedecins.php";
include_once "./Modele/daomedicament.php";
include_once "./Modele/daovisiteurs.php";
include_once "./Modele/daorapport.php";
include_once "./Modele/Rapport.php";


$type = $_GET["type"];

if($type=="Rapport"){
    include "./Vue/boot.html.php";
    include "./Vue/vueRapport.php";
}

elseif($type=="RemplirRapport"){ //Synt de CreeRapport
    $dateErr = $motifErr = $bilanErr = $idMedecinErr = "";
    $name = $email = $gender = $comment = $website = "";

    $listeMedicaments=daomedicaments::getMedicaments();
    $listeMedecins=daomedecins::getMedecins();
    $visiteur= daovisiteurs::ChargeVisiteur();
    if (isset($_POST["date"]) && isset($_POST["motif"]) && isset($_POST["bilan"]) && isset($_POST["idMedecin"])){
        
        if ($_POST["date"]!=""){
            $date=$_POST["date"];
            $motif = $_POST["motif"];
            $bilan = $_POST["bilan"];
            $idVisiteur=daoauthentification::getIdLoggedOn();
            $idMedecin = $_POST["idMedecin"];
        }
    }
    // if(isset($_POST["date"])){
    //     if ($_POST["date"]=="") {
    //         $dateErr = "Mettez la date";
    //     }
    // }

    // if (empty($_POST["motif"])) {
    //     $motifErr = "Mettez le motif";
    // }

    // if (empty($_POST["bilan"])) {
    //     $bilanErr = "Mettez le bilan";
    // }

    // if (empty($_POST["idMedecin"])) {
    //     $idMedecinErr = "Mettez le medecin";
    // }

    if (isset($date) && isset($motif) && isset($bilan) && isset($idVisiteur) && isset($idMedecin)){
        daorapport::addRapport($date, $motif, $bilan, $idVisiteur, $idMedecin);
        include './Vue/boot.html.php';
        include './Vue/vueNbMed.php';
    }
    else{
        include './Vue/boot.html.php';
        include './Vue/vueCreeRapport.php';
    }
}

elseif ($type=="CreeRapportMed") { // Syn de NbMed
    $medErr="";
    $listrentrermedicament=array();
    $listrentrerquantite=array();
    if (isset($_POST["nbMed"])){
        $nbMed=$_POST["nbMed"];
        $nbMed=intval($nbMed);
        $listeMedicaments=daomedicaments::getMedicaments();
        for($i=0; $i < $nbMed; $i++){
            if (isset($_POST["medicament".$i]) && isset($_POST["quantite".$i])){
                array_push($listrentrermedicament,$_POST["medicament".$i]);
                array_push($listrentrerquantite,$_POST["quantite".$i]);
            }
            else{
                $medErr="Tout les medicaments ne sont pas entrés";
            }
        }

        if ($medErr==""){
            $rapport=daorapport::getiDRapportEnreg();
            for($i=0;$i<count($listrentrermedicament);$i++){
                daomedicaments::addMedicament($rapport, $listrentrermedicament[$i], $listrentrerquantite[$i]);
            }
            include './Vue/boot.html.php';
            include './Vue/vueEnregistrerRapport.php';
        }else{
            include './Vue/boot.html.php';
            include './Vue/vueCreeRapportMed.php';
        }
    }else{
        include './Vue/boot.html.php';
        include './Vue/vueCreeRapportMed.php';
    }
}

elseif ($type="RechercheRapport") {
    $lesRapports=array();
    $rechercheRapport=array();
    if(isset($_POST["date"]) != "0000-00-00"){
        $date=isset($_POST["date"]);
        $rechercheRapport=daorapport::RechercheRapportByDate($date,daoauthentification::getIdLoggedOn());
    }else{
        $lesRapports=daorapport::getRapportbyId(daoauthentification::getIdLoggedOn());
    }
    include "./Vue/boot.html.php";
    include "./Vue/vueVueRapport.php";
}

elseif ($type="VoirRapport") {
    if (isset($_GET["idMedecin"])) {
        $idMedecin = $_GET["idMedecin"];
    }
    
    $RapportsMedecin=daorapport::getRapportMedecin($idMedecin);
    
    include "./Vue/boot.html.php";
    include "./Vue/vueRapportMedecin.php";
}

elseif ($type="VueRapport") {
    $rechercheRapport=array();
    $lesRapports=daorapport::getRapportbyId(daoauthentification::getIdLoggedOn());
    include "./Vue/vueVueRapport.php";
}

elseif ($type="ModifierRapport") {
    $Err="";
    $Rapport=daorapport::getRapportbyIdId(daoauthentification::getIdLoggedOn(),$_POST["id"]);

    include "./Vue/boot.html.php";
    include "./Vue/vueModifierRapport.php";
}

elseif ($type="ajoutmedoc") {
    if (isset($_POST["medicament"]) && isset($_POST["quantite"])){
        $medicament=$_POST["medicament"];
        $quantite=$_POST["quantite"];
    }
    else{
        $medicament="";
        $quantite="";
    }
    
    include "./Vue/vueRapportMed.php";
}

elseif ($type="enregrapport") {
    $leDernierRapport=daorapport::getRapportEnreg();

    include "./Vue/vueEnregistrerRapport.php";
}

elseif ($type="EnregModRapport") {
    if($_POST["motif"] != "" && $_POST["bilan"] != ""){
        $ModRapport=daorapport::UpdateRapport(daoauthentification::getIdLoggedOn(),$_POST["id"], $_POST["motif"], $_POST["bilan"]);
        include "./Vue/boot.html.php";
        include "./Vue/vueEnregModRapport.php";
    }else{
        $Rapport=daorapport::getRapportbyIdId(daoauthentification::getIdLoggedOn(),$_POST["id"]);
        $Err="Ne laissez aucun champ vide !";
        include "./Vue/boot.html.php";
        include "./Vue/vueModifierRapport.php";
    }
}

elseif ($type="NullRapport") {
    $listeMedecins=daomedecins::getMedecins();
    $dateErr="";
    $motifErr="";
    $bilanErr="";
    $idMedecinErr="";

    include './Vue/boot.html.php';
    include "./Vue/vueCreeRapport.php";
}