<?php
include_once 'rapport.php';
include_once "bd.php";
include_once "authentification.inc.php";    

class daorapport{
    public static function ChargeRapport(){
        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from rapport");
            $req->execute();
    
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new rapport($ligne["id"], $ligne["date"], $ligne["motif"], $ligne["bilan"], $ligne["idVisiteur"], $ligne["idMedecin"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getRapport(){
        $resultat = array();

        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from rapport");
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

    public static function getRapportbyId($id){
        $resultat = array();
        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur=\"" . $id . "\";");
            $req->execute();

            $ligne =$req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new rapport($ligne['id'], $ligne['date'], $ligne['motif'], $ligne['bilan'], $ligne['idVisiteur'], $ligne['idMedecin'] );
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } 
            catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
    }

    public static function getRapportbyIdId($id,$id2){
        $resultat = array();
        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur=\"" . $id . "\" and id=\"".$id2. "\";");
            $req->execute();

            $ligne =$req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new rapport($ligne['id'], $ligne['date'], $ligne['motif'], $ligne['bilan'], $ligne['idVisiteur'], $ligne['idMedecin'] );
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } 
            catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $resultat;
    }

    public static function getRapportEnreg(){
        $resultat = array();

        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from `rapport` where id=(select max(id)from rapport)");
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

    public static function getiDRapportEnreg(){
        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select id from `rapport` where id=(select max(id)from rapport)");
            $req->execute();

            // $ligne =$req->fetch(PDO::FETCH_ASSOC);
            // while($ligne) {
            //     $resultat[]= $ligne;
            $req = $req->fetch();
            // }
        } 
            catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
            return $req["id"];
    }

    public static function getIdMedecin(){
        $resultat = array();

        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select idMedecin from rapport");
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

    public static function getMedecinById($idMedecin) {
    
        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select nom from medecin, rapport where medecin.id=rapport.idMedecin AND idMedecin=:idMedecin");
            $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
            $req->execute();
            
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }


    public static function addRapport($date, $motif, $bilan, $idVisiteur, $idMedecin) {
        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("insert into Rapport (date, motif, bilan, idVisiteur, idMedecin) values(:date, :motif, :bilan, :idVisiteur, :idMedecin)");
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_STR);
            $req->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);

            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public static function RechercheRapportByDate($date,$id) {
        $resultat = array();
         try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select * from rapport where date like :date and idVisiteur=\"" .$id. "\";");
            $req->bindValue(':date', "%".$date."%", PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = new rapport($ligne['id'], $ligne['date'], $ligne['motif'], $ligne['bilan'], $ligne['idVisiteur'], $ligne['idMedecin'] );
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function UpdateRapport($idVisiteur, $id, $motif, $bilan){
        try{
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("update Rapport set motif=:motif, bilan=:bilan where id=:id and idVisiteur=:idVisiteur;");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':idVisiteur', $idVisiteur, PDO::PARAM_INT);
            $req->bindValue(':motif', $motif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
            $resultat = $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      public static function getRapportMedecin($idMedecin) {
        $resultat = array();

        try {
            $cnx = connexionpdo::connexionPDO();
            $req = $cnx->prepare("select rapport.* from rapport, medecin where rapport.idMedecin=medecin.id and medecin.id=:id order by date desc");
            $req->bindValue(':id', $idMedecin, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}