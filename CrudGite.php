<?php
class CrudGite{
    private $id;
    private $nom;
    private $adresse;
    private $prix;

    public function __construct($data) {
        $this->id = $data['id_gite'];
        $this->nom = $data['nom'];
        $this->adresse = $data['adresse'];
        $this->prix = $data['prix'];
    }


    //getters
    public function getID(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getPrix(){
        return $this->prix;
    }

    //setters
    public function setID(){
        $this->id=$id;
    }

    public function setNom(){
        $this->nom=$nom;
    }

    public function setAdresse(){
        $this->adresse=$adresse;
    }
    public function setPrix(){
        $this->prix=$prix;
    }
}