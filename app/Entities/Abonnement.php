<?php

class Abonnement
{
    private $id_abonnement;
    private $type;
    private $date_debut;
    private $date_fin;
    private $adherent_id;

    public function __construct(
        $id_abonnement = null,
        $type = null,
        $date_debut = null,
        $date_fin = null,
        $adherent_id = null
    ) {
        $this->id_abonnement = $id_abonnement;
        $this->type = $type;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->adherent_id = $adherent_id;
    }

    public function getIdAbonnement()
    {
        return $this->id_abonnement;
    }

    public function setIdAbonnement($id)
    {
        $this->id_abonnement = $id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getDateDebut()
    {
        return $this->date_debut;
    }

    public function setDateDebut($date)
    {
        $this->date_debut = $date;
    }

    public function getDateFin()
    {
        return $this->date_fin;
    }

    public function setDateFin($date)
    {
        $this->date_fin = $date;
    }

    public function getAdherentId()
    {
        return $this->adherent_id;
    }

    public function setAdherentId($id)
    {
        $this->adherent_id = $id;
    }
}