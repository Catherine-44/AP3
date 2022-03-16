<?php

class rapport{
    private $id;
    private $date;
    private $motif;
    private $bilan;
    private $idVisiteur;
    private $idMedecin;

    public function __construct($unid,$unedate,$unmotif,$unbilan,$unVisiteur,$unMedecin){
        $this->id=$unid;
        $this->date=$unedate;
        $this->motif=$unmotif;
        $this->bilan=$unbilan;
        $this->idVisiteur=$unVisiteur;
        $this->idMedecin=$unMedecin;
    }

    public function getId(){
        return $this->id;
    }

    public function getDate(){
        return $this->date;
    }

    public function getMotif(){
        return $this->motif;
    }

    public function getBilan(){
        return $this->bilan;
    }
}