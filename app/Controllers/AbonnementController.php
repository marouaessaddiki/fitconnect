<?php

require_once __DIR__ . '/../Services/AbonnementService.php';

class AbonnementController
{
    private $service;

    public function __construct()
    {
        $this->service = new AbonnementService();
    }

    // Afficher tous les abonnements
    public function index()
    {
        return $this->service->getAll();
    }

    // Chercher un abonnement
    public function show($id)
    {
        return $this->service->getById($id);
    }

    // Ajouter
    public function store(Abonnement $abonnement)
    {
        return $this->service->create($abonnement);
    }

    // Modifier
    public function update(Abonnement $abonnement)
    {
        return $this->service->update($abonnement);
    }

    // Supprimer
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}