<?php

require_once __DIR__ . '/../Services/AdherentService.php';
require_once __DIR__ . '/../Entities/Adherent.php';

class AdherentController
{
    private $service;

    public function __construct()
    {
        $this->service = new AdherentService();
    }

    // Afficher tous les adhérents
    public function index()
    {
        return $this->service->getAll();
    }

    // Afficher un adhérent
    public function show($id)
    {
        return $this->service->getById($id);
    }

    // Ajouter un adhérent
    public function store(Adherent $adherent)
    {
        return $this->service->create($adherent);
    }

    // Modifier un adhérent
    public function update(Adherent $adherent)
    {
        return $this->service->update($adherent);
    }

    // Supprimer un adhérent
    public function delete($id)
    {
        return $this->service->delete($id);
    }
}