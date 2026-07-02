<?php

require_once __DIR__ . '/../Services/SeanceService.php';

class SeanceController
{
    private $service;

    public function __construct()
    {
        $this->service = new SeanceService();
    }

    // Afficher toutes les séances
    public function index()
    {
        return $this->service->getAll();
    }

    // Afficher une séance
    public function show($id)
    {
        return $this->service->getById($id);
    }

    // Ajouter
    public function store(Seance $seance)
    {
        return $this->service->create($seance);
    }

    // Modifier
    public function update(Seance $seance)
    {
        return $this->service->update($seance);
    }

    // Supprimer
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}