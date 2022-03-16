
<?php

include_once "daovisiteurs.php";

Class daoauthentification{

    public static function login($login, $mdp) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $util= daovisiteurs::getVisiteursBylogin($login);
        $mdpBD = $util["mdp"];
        if ($mdpBD == $mdp) {
            $_SESSION["login"] = $login;
            $_SESSION["mdp"] = $mdpBD;
            $_SESSION["id"] = $util["id"];
            $_SESSION["nom"] = $util ["nom"];
            $_SESSION["prenom"] = $util ["prenom"];
            $_SESSION["adresse"] = $util ["adresse"];

        }else{
            echo "L'identifiant ou mot de passe est incorrect";
        }
    }

    public static function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["login"]);
        unset($_SESSION["mdp"]);
    }
    
    public static function getIdLoggedOn(){
        if (daoauthentification::isLoggedOn()){
            $ret = $_SESSION["id"];
        }
        else {
            $ret = "";
        }
        return $ret;
    
    }

    public static function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;
        
        if (isset($_SESSION["login"])) {
            $util = daovisiteurs::getVisiteursBylogin($_SESSION["login"]);
            if ($util["login"] == $_SESSION["login"] && $util["mdp"] == $_SESSION["mdp"]) {
                $ret = true;
            }
        }
        return $ret;
    }

    public static function getnomLoggedOn(){
        if (daoauthentification::isLoggedOn()){
            $ret = $_SESSION["nom"];
        }
        else {
            $ret = "";
        }
        return $ret;
    
    }

    public static function getprenomLoggedOn(){
        if (daoauthentification::isLoggedOn()){
            $ret = $_SESSION["prenom"];
        }
        else {
            $ret = "";
        }
        return $ret;
    
    }

    public static function getadresseLoggedOn(){
        if (daoauthentification::isLoggedOn()){
            $ret = $_SESSION["adresse"];
        }
        else {
            $ret = "";
        }
        return $ret;
    
    }

}