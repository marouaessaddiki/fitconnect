<?php

require_once __DIR__ . '/../Repositories/AdherentRepository.php';

class AdherentService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AdherentRepository();
    }

    // Récupérer tous les adhérents
    public function getAll()
    {
        return $this->repository->getAll();
    }

    // Ajouter un adhérent
    public function create(Adherent $adherent)
    {
        if (empty($adherent->getNom())) {
            throw new Exception("Le nom est obligatoire.");
        }

        if (!filter_var($adherent->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email invalide.");
        }

        return $this->repository->create($adherent);
    }

    // Chercher par ID
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    // Modifier
    public function update(Adherent $adherent)
    {
        return $this->repository->update($adherent);
    }

    // Supprimer
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}