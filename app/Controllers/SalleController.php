<?php

require_once __DIR__ . '/../Services/SalleService.php';

class SalleController
{
    private $service;

    public function __construct()
    {
        $this->service = new SalleService();
    }

    // Afficher toutes les salles
    public function index()
    {
        return $this->service->getAll();
    }

    // Afficher une salle
    public function show($id)
    {
        return $this->service->getById($id);
    }

    // Ajouter
    public function store(Salle $salle)
    {
        return $this->service->create($salle);
    }

    // Modifier
    public function update(Salle $salle)
    {
        return $this->service->update($salle);
    }

    // Supprimer
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}