<?php

require_once __DIR__ . '/../Services/SeanceService.php';

class SeanceController
{
    private $service;

    public function __construct()
    {
        $this->service = new SeanceService();
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function store(Seance $seance)
    {
        return $this->service->create($seance);
    }

    public function update(Seance $seance)
    {
        return $this->service->update($seance);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}