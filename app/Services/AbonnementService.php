<?php

require_once __DIR__ . '/../Repositories/AbonnementRepository.php';

class AbonnementService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AbonnementRepository();
    }

    // Afficher tous les abonnements
    public function getAll()
    {
        return $this->repository->getAll();
    }

    // Chercher un abonnement
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    // Ajouter un abonnement
    public function create(Abonnement $abonnement)
    {
        if (empty($abonnement->getType())) {
            throw new Exception("Le type d'abonnement est obligatoire.");
        }

        if ($abonnement->getDateDebut() > $abonnement->getDateFin()) {
            throw new Exception("La date de début doit être avant la date de fin.");
        }

        return $this->repository->create($abonnement);
    }

    // Modifier un abonnement
    public function update(Abonnement $abonnement)
    {
        if ($abonnement->getDateDebut() > $abonnement->getDateFin()) {
            throw new Exception("La date de début doit être avant la date de fin.");
        }

        return $this->repository->update($abonnement);
    }

    // Supprimer
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}