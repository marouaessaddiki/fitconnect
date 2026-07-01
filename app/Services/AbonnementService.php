<?php

require_once __DIR__ . '/../Repositories/AbonnementRepository.php';

class AbonnementService
{
    private $abonnementRepo;

    public function __construct()
    {
        $this->abonnementRepo = new AbonnementRepository();
    }

    public function getAll()
    {
        return $this->abonnementRepo->getAll();
    }

    public function getById($id)
    {
        return $this->abonnementRepo->getById($id);
    }

    public function create(Abonnement $abonnement)
    {
        if($abonnement->getDateFin() < $abonnement->getDateDebut())
        {
            throw new Exception(
                "Date fin invalide."
            );
        }

        return $this->abonnementRepo->create($abonnement);
    }

    public function update(Abonnement $abonnement)
    {
        return $this->abonnementRepo->update($abonnement);
    }

    public function delete($id)
    {
        return $this->abonnementRepo->delete($id);
    }
}