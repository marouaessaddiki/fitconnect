<?php

require_once __DIR__ . '/../Repositories/SalleRepository.php';

class SalleService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SalleRepository();
    }

    // Afficher toutes les salles
    public function getAll()
    {
        return $this->repository->getAll();
    }

    // Chercher une salle
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    // Ajouter
    public function create(Salle $salle)
    {
        if (empty($salle->getNom())) {
            throw new Exception("Le nom de la salle est obligatoire.");
        }

        return $this->repository->create($salle);
    }

    // Modifier
    public function update(Salle $salle)
    {
        if (empty($salle->getNom())) {
            throw new Exception("Le nom de la salle est obligatoire.");
        }

        return $this->repository->update($salle);
    }

    // Supprimer
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}