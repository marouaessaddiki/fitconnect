<?php

class Abonnement
{
    private $id_abonnement;
    private $type;
    private $date_debut;
    private $date_fin;

    public function __construct(
        $id_abonnement = null,
        $type = "",
        $date_debut = "",
        $date_fin = ""
    ) {
        $this->id_abonnement = $id_abonnement;
        $this->type = $type;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }

    // Getters
    public function getIdAbonnement()
    {
        return $this->id_abonnement;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDateDebut()
    {
        return $this->date_debut;
    }

    public function getDateFin()
    {
        return $this->date_fin;
    }

    // Setters
    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDateDebut($date)
    {
        $this->date_debut = $date;
    }

    public function setDateFin($date)
    {
        $this->date_fin = $date;
    }
}