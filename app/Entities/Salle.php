<?php

class Salle
{
    private $salle_id;
    private $nom;
    private $adresse;

    public function __construct($salle_id = null, $nom = null, $adresse = null)
    {
        $this->salle_id = $salle_id;
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function getSalleId()
    {
        return $this->salle_id;
    }

    public function setSalleId($salle_id)
    {
        $this->salle_id = $salle_id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
}