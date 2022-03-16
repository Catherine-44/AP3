<?php
include_once "./Modele/authentification.inc.php";

if (isset($_POST["login"]) && isset($_POST["mdp"])){
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
}
else
{
    $login="";
    $mdp="";
}

if($login !=""){
    daoauthentification::login($login,$mdp);
}

if (daoauthentification::isLoggedOn()){
    include "./Controleur/Accueil.php";
}else{
    include "./vue/vueConnexion.php";

}