<?php

class medicament{

    private $id;
    private $nomCommercial;
    private $idFamille;
    private $composition;
    private $effets;
    private $contreIndications;

    public function __contruct($unid,$unnomCommercial,$unidFamille,$unecomposition,$unEffet,$unecontreIndication){
        $this->id=$unid;
        $this->nomCommercial=$unnomCommercial;
        $this->idFamille=$unidFamille;
        $this->composition=$unecomposition;
        $this->effets=$unEffet;
        $this->contreIndication=$unecontreIndication;
    }

}