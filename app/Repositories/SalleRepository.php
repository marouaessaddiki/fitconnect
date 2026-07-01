<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Salle.php';

class SalleRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM salle");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM salle WHERE salle_id=?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(Salle $salle)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO salle(nom,adresse)
             VALUES(?,?)"
        );

        return $stmt->execute([
            $salle->getNom(),
            $salle->getAdresse()
        ]);
    }

    public function update(Salle $salle)
    {
        $stmt = $this->conn->prepare(
            "UPDATE salle
             SET nom=?,adresse=?
             WHERE salle_id=?"
        );

        return $stmt->execute([
            $salle->getNom(),
            $salle->getAdresse(),
            $salle->getSalleId()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM salle WHERE salle_id=?"
        );

        return $stmt->execute([$id]);
    }
}