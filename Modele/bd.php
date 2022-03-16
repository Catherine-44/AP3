<?php

class connexionpdo{

    private $login;
    private $mdp;
    private $bd;
    private $serveur;

    public function __construct($unlogin, $unmdp, $unbd, $unserveur){
        $this->login=$unlogin;
        $this->mdp=$unmdp;
        $this->bd=$unbd;
        $this->serveur=$unserveur;
    }

    public static function connexionPDO() {
        $login = "root";
        $mdp = "root";
        $bd = "ap3";
        $serveur = "localhost";
    
        try {
            $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            print "Erreur de connexion PDO ";
            die();
        }
    }
}

?>
