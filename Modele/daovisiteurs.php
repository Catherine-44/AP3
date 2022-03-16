<?php 

include_once "bd.php";
include_once "visiteurs.php";
include_once "authentification.inc.php";

class daovisiteurs{

    public static function getVisiteur(){
        $resultat = array();

        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from visiteur");
            $req->execute();

            $ligne =$req->fetch(PDO::FETCH_ASSOC);
            while($ligne) {
                $resultat[]= $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } 
            catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function ChargeVisiteur(){
            try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select * from Visiteur");
                $req->execute();
    
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
                while ($ligne) {
                    $resultat[] = new visiteurs($ligne["id"], $ligne["nom"], $ligne["prenom"], ["login"], $ligne["mdp"], $ligne["adresse"], $ligne["cp"], $ligne["ville"], $ligne["dateEmbauche"], $ligne["timespan"], $ligne["ticket"]);
                    $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function getVisiteursBylogin($login) {

            try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select * from visiteur where login=:login");
                $req->bindValue(':login', $login, PDO::PARAM_STR);
                $req->execute();
                
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }
    
        public static function getVisiteurBynom($NomVisiteur) {
    
            try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select nom from visiteur where nom=:nom");
                $req->bindValue(':nom', $NomVisiteur, PDO::PARAM_STR);
                $req->execute();
                
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }
}