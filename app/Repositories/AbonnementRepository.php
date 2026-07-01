<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Abonnement.php';

class AbonnementRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM abonnement");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM abonnement WHERE id_abonnement=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByAdherent($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM abonnement WHERE adherent_id=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(Abonnement $abonnement)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO abonnement(type,date_debut,date_fin,adherent_id)
             VALUES(?,?,?,?)"
        );

        return $stmt->execute([
            $abonnement->getType(),
            $abonnement->getDateDebut(),
            $abonnement->getDateFin(),
            $abonnement->getAdherentId()
        ]);
    }

    public function update(Abonnement $abonnement)
    {
        $stmt = $this->conn->prepare(
            "UPDATE abonnement
             SET type=?,
                 date_debut=?,
                 date_fin=?,
                 adherent_id=?
             WHERE id_abonnement=?"
        );

        return $stmt->execute([
            $abonnement->getType(),
            $abonnement->getDateDebut(),
            $abonnement->getDateFin(),
            $abonnement->getAdherentId(),
            $abonnement->getIdAbonnement()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM abonnement WHERE id_abonnement=?"
        );

        return $stmt->execute([$id]);
    }
}