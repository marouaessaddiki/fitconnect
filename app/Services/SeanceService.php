<?php

require_once __DIR__ . '/../Repositories/SeanceRepository.php';

class SeanceService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SeanceRepository();
    }

    // Afficher toutes les séances
    public function getAll()
    {
        return $this->repository->getAll();
    }

    // Chercher une séance
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    // Ajouter
    public function create(Seance $seance)
    {
        if (empty($seance->getActivite())) {
            throw new Exception("L'activité est obligatoire.");
        }

        if ($seance->getDuree() <= 0) {
            throw new Exception("La durée doit être supérieure à 0.");
        }

        return $this->repository->create($seance);
    }

    // Modifier
    public function update(Seance $seance)
    {
        if ($seance->getDuree() <= 0) {
            throw new Exception("La durée doit être supérieure à 0.");
        }

        return $this->repository->update($seance);
    }

    // Supprimer
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}