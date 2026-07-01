<?php

class Adherent
{
    private $id_adherent;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $date_inscription;
    private $salle_id;

    public function __construct(
        $id_adherent = null,
        $nom = null,
        $prenom = null,
        $email = null,
        $telephone = null,
        $date_inscription = null,
        $salle_id = null
    ) {
        $this->id_adherent = $id_adherent;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->date_inscription = $date_inscription;
        $this->salle_id = $salle_id;
    }

    public function getIdAdherent()
    {
        return $this->id_adherent;
    }

    public function setIdAdherent($id)
    {
        $this->id_adherent = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    public function setDateInscription($date)
    {
        $this->date_inscription = $date;
    }

    public function getSalleId()
    {
        return $this->salle_id;
    }

    public function setSalleId($salle_id)
    {
        $this->salle_id = $salle_id;
    }
}