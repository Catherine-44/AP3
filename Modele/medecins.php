<?php

class medecins{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $specialitecomplementaire;
    private $departement;

    public function __construct($unid,$unnom,$unprenom,$uneadresse,$untel,$unespecialitecomplementaire,$undepartement){
        $this->id=$unid;
        $this->nom=$unnom;
        $this->prenom=$unprenom;
        $this->adresse=$uneadresse;
        $this->tel=$untel;
        $this->specialitecomplementaire=$unespecialitecomplementaire;
        $this->departement=$undepartement;
    }

    public function getid(){
        return $this->id;
    }

    public function getnom(){
        return $this->nom;
    }

    public function getprenom(){
        return $this->prenom;
    }

    public function getadresse(){
        return $this->adresse;
    }

    public function gettel(){
        return $this->tel;
    }

}