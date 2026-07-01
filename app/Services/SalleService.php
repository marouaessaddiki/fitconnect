<?php

require_once __DIR__ . '/../Repositories/SalleRepository.php';

class SalleService
{
    private $salleRepo;

    public function __construct()
    {
        $this->salleRepo = new SalleRepository();
    }

    public function getAll()
    {
        return $this->salleRepo->getAll();
    }

    public function getById($id)
    {
        return $this->salleRepo->getById($id);
    }

    public function create(Salle $salle)
    {
        return $this->salleRepo->create($salle);
    }

    public function update(Salle $salle)
    {
        return $this->salleRepo->update($salle);
    }

    public function delete($id)
    {
        return $this->salleRepo->delete($id);
    }
}