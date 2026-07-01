<?php

require_once __DIR__ . '/../Services/AbonnementService.php';

class AbonnementController
{
    private $service;

    public function __construct()
    {
        $this->service = new AbonnementService();
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function store(Abonnement $abonnement)
    {
        return $this->service->create($abonnement);
    }

    public function update(Abonnement $abonnement)
    {
        return $this->service->update($abonnement);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}