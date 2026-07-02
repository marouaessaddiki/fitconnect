<?php

class Seance
{
    private $id_seance;
    private $date_seance;
    private $duree;
    private $activite;
    private $equipement;
    private $id_adherent;
    private $salle_id;

    public function __construct(
        $id_seance = null,
        $date_seance = "",
        $duree = 0,
        $activite = "",
        $equipement = "",
        $id_adherent = null,
        $salle_id = null
    ) {
        $this->id_seance = $id_seance;
        $this->date_seance = $date_seance;
        $this->duree = $duree;
        $this->activite = $activite;
        $this->equipement = $equipement;
        $this->id_adherent = $id_adherent;
        $this->salle_id = $salle_id;
    }

    // Getters
    public function getIdSeance()
    {
        return $this->id_seance;
    }

    public function getDateSeance()
    {
        return $this->date_seance;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getActivite()
    {
        return $this->activite;
    }

    public function getEquipement()
    {
        return $this->equipement;
    }

    public function getIdAdherent()
    {
        return $this->id_adherent;
    }

    public function getSalleId()
    {
        return $this->salle_id;
    }

    // Setters
    public function setDateSeance($date)
    {
        $this->date_seance = $date;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    public function setActivite($activite)
    {
        $this->activite = $activite;
    }

    public function setEquipement($equipement)
    {
        $this->equipement = $equipement;
    }

    public function setIdAdherent($id)
    {
        $this->id_adherent = $id;
    }

    public function setSalleId($id)
    {
        $this->salle_id = $id;
    }
}