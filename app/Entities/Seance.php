<?php

class Seance
{
    private $id_seance;
    private $date;
    private $duree;
    private $activite;
    private $equipement;
    private $adherent_id;
    private $salle_id;

    public function __construct(
        $id_seance = null,
        $date = null,
        $duree = null,
        $activite = null,
        $equipement = null,
        $adherent_id = null,
        $salle_id = null
    ) {
        $this->id_seance = $id_seance;
        $this->date = $date;
        $this->duree = $duree;
        $this->activite = $activite;
        $this->equipement = $equipement;
        $this->adherent_id = $adherent_id;
        $this->salle_id = $salle_id;
    }

    public function getIdSeance()
    {
        return $this->id_seance;
    }

    public function setIdSeance($id)
    {
        $this->id_seance = $id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    public function getActivite()
    {
        return $this->activite;
    }

    public function setActivite($activite)
    {
        $this->activite = $activite;
    }

    public function getEquipement()
    {
        return $this->equipement;
    }

    public function setEquipement($equipement)
    {
        $this->equipement = $equipement;
    }

    public function getAdherentId()
    {
        return $this->adherent_id;
    }

    public function setAdherentId($id)
    {
        $this->adherent_id = $id;
    }

    public function getSalleId()
    {
        return $this->salle_id;
    }

    public function setSalleId($id)
    {
        $this->salle_id = $id;
    }
}