<?php

require_once __DIR__ . '/../Services/SalleService.php';

class SalleController
{
    private $service;

    public function __construct()
    {
        $this->service = new SalleService();
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function store(Salle $salle)
    {
        return $this->service->create($salle);
    }

    public function update(Salle $salle)
    {
        return $this->service->update($salle);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}