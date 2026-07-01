<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Adherent.php';

class AdherentRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM adherent";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM adherent WHERE id_adherent = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(Adherent $adherent)
    {
        $sql = "INSERT INTO adherent
        (nom, prenom, email, telephone, date_inscription, salle_id)
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $adherent->getNom(),
            $adherent->getPrenom(),
            $adherent->getEmail(),
            $adherent->getTelephone(),
            $adherent->getDateInscription(),
            $adherent->getSalleId()
        ]);
    }

    public function update(Adherent $adherent)
    {
        $sql = "UPDATE adherent
                SET nom=?,
                    prenom=?,
                    email=?,
                    telephone=?,
                    date_inscription=?,
                    salle_id=?
                WHERE id_adherent=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $adherent->getNom(),
            $adherent->getPrenom(),
            $adherent->getEmail(),
            $adherent->getTelephone(),
            $adherent->getDateInscription(),
            $adherent->getSalleId(),
            $adherent->getIdAdherent()
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM adherent WHERE id_adherent=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}
