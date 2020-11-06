<?php

require_once File::build_path(array("model", "Model.php"));

class ModelPierre extends Model{
    private $idPierre;
    private $idType
;    private $idForme;
    private $nom;
    private $prix;
    private $poids;
    private $volume;
    private $paysProvenance;
    private $adrrImage;
    protected static $object = "pierre";
    protected static $primary='idPierre';
    
    
    function __construct($idPierre = null, $idType = null, $idForme = null, $nom = null, $prix = null, $poids = null, $volume = null, $paysProvenance = null, $adrrImage = null) {
        if (!is_null($idPierre) && !is_null($idType) && !is_null($idForme) && !is_null($nom) && !is_null($poids) && !is_null($prix) && !is_null($volume) && !is_null($paysProvenance)&& !is_null($adrrImage)) {
            $this->idPierre = $idPierre;
            $this->idType = $idType;
            $this->idForme = $idForme;
            $this->nom = $nom;
            $this->prix = $prix;
            $this->poids = $poids;
            $this->volume = $volume;
            $this->paysProvenance = $paysProvenance;
            $this->adrrImage = $adrrImage;
        }
    }
    
    function getIdPierre() {
        return $this->idPierre;
    }

    function getIdType() {
        return $this->idType;
    }

    function getIdForme() {
        return $this->idForme;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrix() {
        return $this->prix;
    }

    function getPoids() {
        return $this->poids;
    }

    function getVolume() {
        return $this->volume;
    }

    function getPaysProvenance() {
        return $this->paysProvenance;
    }

    function setIdPierre($idPierre): void {
        $this->idPierre = $idPierre;
    }

    function setIdType($idType): void {
        $this->idType = $idType;
    }

    function setIdForme($idForme): void {
        $this->idForme = $idForme;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

    function setPoids($poids): void {
        $this->poids = $poids;
    }

    function setVolume($volume): void {
        $this->volume = $volume;
    }

    function setPaysProvenance($paysProvenance): void {
        $this->paysProvenance = $paysProvenance;
    }
    
    function getAdrrImage() {
        return $this->adrrImage;
    }

    function setAdrrImage($adrrImage): void {
        $this->adrrImage = $adrrImage;
    }


    
}

