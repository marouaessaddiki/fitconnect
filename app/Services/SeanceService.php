<?php

require_once __DIR__ . '/../Repositories/SeanceRepository.php';
require_once __DIR__ . '/../Repositories/AbonnementRepository.php';

class SeanceService
{
    private $seanceRepo;
    private $abonnementRepo;

    public function __construct()
    {
        $this->seanceRepo = new SeanceRepository();
        $this->abonnementRepo = new AbonnementRepository();
    }

    public function getAll()
    {
        return $this->seanceRepo->getAll();
    }

    public function getById($id)
    {
        return $this->seanceRepo->getById($id);
    }

    public function create(Seance $seance)
    {
        $abonnements = $this->abonnementRepo
                            ->getByAdherent(
                                $seance->getAdherentId()
                            );

        $valide = false;

        foreach($abonnements as $abonnement)
        {
            if(
                date('Y-m-d') >= $abonnement['date_debut']
                &&
                date('Y-m-d') <= $abonnement['date_fin']
            )
            {
                $valide = true;
                break;
            }
        }

        if(!$valide)
        {
            throw new Exception(
                "Abonnement expiré. Séance refusée."
            );
        }

        return $this->seanceRepo->create($seance);
    }

    public function update(Seance $seance)
    {
        return $this->seanceRepo->update($seance);
    }

    public function delete($id)
    {
        return $this->seanceRepo->delete($id);
    }
}