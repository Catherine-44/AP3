<?php

class Offrir{
    private $idmedicament;
    private $quantite;

    public function __construct($unIdMedicament, $uneQte){
        $this->idmedicament=$unIdMedicament;
        $this->quantite=$uneQte;
    }

    public function getIdMedicament(){
        return $this->idmedicament;
    }

    public function getQuantite(){
        return $this->quantite;
    }
}