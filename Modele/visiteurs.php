<?php 

class visiteurs{

    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;
    private $dateEmbauche;
    private $timespan;
    private $ticket;

    public function __construct($unid,$unnom,$unprenom,$unlogin,$unmdp,$uneadresse,$uncp,$uneville,$unedateEmbauche,$untimespan,$unticket){

        $this->id=$unid;
        $this->nom=$unnom;
        $this->prenom=$unprenom;
        $this->login=$unlogin;
        $this->mdp=$unmdp;
        $this->adresse=$uneadresse;
        $this->cp=$uncp;
        $this->ville=$uneville;
        $this->dateEmbauche=$unedateEmbauche;
        $this->timespan=$untimespan;
        $this->ticket=$unticket;
    }

}