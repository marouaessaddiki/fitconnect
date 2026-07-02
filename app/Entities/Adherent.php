<?php

class Adherent
{
    private $id_adherent;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $date_inscription;
    private $id_abonnement;
    private $salle_id;

    public function __construct(
        $id_adherent = null,
        $nom = "",
        $prenom = "",
        $email = "",
        $telephone = "",
        $date_inscription = "",
        $id_abonnement = null,
        $salle_id = null
    ) {
        $this->id_adherent = $id_adherent;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->date_inscription = $date_inscription;
        $this->id_abonnement = $id_abonnement;
        $this->salle_id = $salle_id;
    }

    // Getters
    public function getIdAdherent()
    {
        return $this->id_adherent;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    public function getIdAbonnement()
    {
        return $this->id_abonnement;
    }

    public function getSalleId()
    {
        return $this->salle_id;
    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setDateInscription($date)
    {
        $this->date_inscription = $date;
    }

    public function setIdAbonnement($id)
    {
        $this->id_abonnement = $id;
    }

    public function setSalleId($id)
    {
        $this->salle_id = $id;
    }
}