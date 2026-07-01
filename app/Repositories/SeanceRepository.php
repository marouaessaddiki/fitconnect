<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Seance.php';

class SeanceRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM seance");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM seance WHERE id_seance=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByAdherent($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM seance WHERE adherent_id=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(Seance $seance)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO seance
            (date,duree,activite,equipement,adherent_id,salle_id)
            VALUES(?,?,?,?,?,?)"
        );

        return $stmt->execute([
            $seance->getDate(),
            $seance->getDuree(),
            $seance->getActivite(),
            $seance->getEquipement(),
            $seance->getAdherentId(),
            $seance->getSalleId()
        ]);
    }

    public function update(Seance $seance)
    {
        $stmt = $this->conn->prepare(
            "UPDATE seance
             SET date=?,
                 duree=?,
                 activite=?,
                 equipement=?,
                 adherent_id=?,
                 salle_id=?
             WHERE id_seance=?"
        );

        return $stmt->execute([
            $seance->getDate(),
            $seance->getDuree(),
            $seance->getActivite(),
            $seance->getEquipement(),
            $seance->getAdherentId(),
            $seance->getSalleId(),
            $seance->getIdSeance()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM seance WHERE id_seance=?"
        );

        return $stmt->execute([$id]);
    }
}