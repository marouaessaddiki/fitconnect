<?php

require_once __DIR__ . '/../Repositories/AdherentRepository.php';
require_once __DIR__ . '/../Repositories/AbonnementRepository.php';
require_once __DIR__ . '/../Repositories/SeanceRepository.php';

class AdherentService
{
    private $adherentRepo;
    private $abonnementRepo;
    private $seanceRepo;

    public function __construct()
    {
        $this->adherentRepo = new AdherentRepository();
        $this->abonnementRepo = new AbonnementRepository();
        $this->seanceRepo = new SeanceRepository();
    }

    public function getAll()
    {
        return $this->adherentRepo->getAll();
    }

    public function getById($id)
    {
        return $this->adherentRepo->getById($id);
    }

    public function create(Adherent $adherent)
    {
        return $this->adherentRepo->create($adherent);
    }

    public function update(Adherent $adherent)
    {
        return $this->adherentRepo->update($adherent);
    }

    public function delete($id)
    {
        $seances = $this->seanceRepo->getByAdherent($id);

        if(count($seances) > 0)
        {
            throw new Exception(
                "Impossible de supprimer cet adhérent : il possède des séances."
            );
        }

        $abonnements = $this->abonnementRepo->getByAdherent($id);

        foreach($abonnements as $abonnement)
        {
            if($abonnement['date_fin'] >= date('Y-m-d'))
            {
                throw new Exception(
                    "Impossible de supprimer cet adhérent : abonnement actif."
                );
            }
        }

        return $this->adherentRepo->delete($id);
    }
}