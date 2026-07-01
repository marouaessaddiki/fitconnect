<?php

require_once __DIR__ . '/../Services/AdherentService.php';

class AdherentController
{
    private $service;

    public function __construct()
    {
        $this->service = new AdherentService();
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function store(Adherent $adherent)
    {
        return $this->service->create($adherent);
    }

    public function update(Adherent $adherent)
    {
        return $this->service->update($adherent);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}