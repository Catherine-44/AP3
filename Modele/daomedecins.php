<?php 

include_once "bd.php";
include_once "medecins.php";
include_once "authentification.inc.php";

class daomedecins{

    public static function getMedecins(){
        $resultat = array();

        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from medecin");
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

        public static function getMedecinBynom($NomMedecin) {
    
            try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select nom from medecin where nom=:nom");
                $req->bindValue(':nom', $NomMedecin, PDO::PARAM_STR);
                $req->execute();
                
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die(); 
            }
            return $resultat;
        }

        public static function getMedecinByprenom($PrenomMedecin) {
    
            try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select prenom from medecin where prenom=:prenom");
                $req->bindValue(':prenom', $PrenomMedecin, PDO::PARAM_STR);
                $req->execute();
                
                $resultat = $req->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function RechercheMedecinByName($nom) {
            $resultat = array();
             try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select * from medecin where nom like :nom");
                $req->bindValue(':nom', "%".$nom."%", PDO::PARAM_STR);
                $req->execute();
    
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
                while ($ligne) {
                    $resultat[] = new medecins($ligne['id'], $ligne['nom'], $ligne['prenom'], $ligne['adresse'], $ligne['tel'], $ligne['specialitecomplementaire'], $ligne['departement'] );
                    $ligne = $req->fetch(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function RechercheMedecinByNamePres($nom) {
            $resultat = array();
             try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select * from medecin where nom =\"".$nom."\";");
                // $req->bindValue(':nom', "%".$nom."%", PDO::PARAM_STR);
                $req->execute();
                print($nom);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
                while ($ligne) {
                    $resultat[] = new medecins($ligne['id'], $ligne['nom'], $ligne['prenom'], $ligne['adresse'], $ligne['tel'], $ligne['specialitecomplementaire'], $ligne['departement'] );
                    $ligne = $req->fetch(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function ChargeMedecinbyId($id){
            $resultat=array();
            try {
                $cnx = connexionpdo::connexionpdo();
                $requete = $cnx->prepare("select * from Medecin where id=:id");
                $requete->bindValue(':id', $id, PDO::PARAM_INT);
                $requete->execute();
    
                $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                while ($ligne) {
                    $resultat[] = new medecins($ligne['id'], $ligne['nom'], $ligne['prenom'], $ligne['adresse'], $ligne['tel'], $ligne['specialitecomplementaire'], $ligne['departement'] );
                    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                }
            }catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function UpdateMedecin($id, $adresse, $tel){
            try{
                $cnx = connexionpdo::connexionpdo();
                $req = $cnx->prepare("update medecin set adresse=:adresse, tel=:tel where id=:id");
                $req->bindValue(':id', $id, PDO::PARAM_INT);
                $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                $req->bindValue(':tel', $tel, PDO::PARAM_STR);
    
                $resultat = $req->execute();
    
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
        }

        public static function getMedecinbyId($id){
            $resultat=array();
            try {
                $cnx = connexionpdo::connexionPDO();
                $req = $cnx->prepare("select * from Medecin where id=:id");
                $req->bindValue(':id', $id, PDO::PARAM_INT);
                $req->execute();
    
                $ligne =$req->fetch(PDO::FETCH_ASSOC);
                while ($ligne) {
                    $resultat[] = new medecins($ligne['id'], $ligne['nom'], $ligne['prenom'], $ligne['adresse'], $ligne['tel'], $ligne['specialitecomplementaire'], $ligne['departement'] );
                    $ligne = $req->fetch(PDO::FETCH_ASSOC);
                }
            } 
                catch (PDOException $e) {
                    print "Erreur !: " . $e->getMessage();
                    die();
                }
                return $resultat;
        }

        
    

}