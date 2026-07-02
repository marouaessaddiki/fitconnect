<?php

class Salle
{
    private $salleId;
    private $nom;
    private $adresse;

    public function __construct($salleId = null, $nom = "", $adresse = "")
    {
        $this->salleId = $salleId;
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    // Getters
    public function getSalleId()
    {
        return $this->salleId;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    // Setters
    public function setSalleId($salleId)
    {
        $this->salleId = $salleId;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
}