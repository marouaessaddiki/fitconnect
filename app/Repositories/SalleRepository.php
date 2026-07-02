<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Salle.php';

class SalleRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Afficher toutes les salles
    public function getAll()
    {
        $sql = "SELECT * FROM salle";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $salles = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $salles[] = new Salle(
                $row['salle_id'],
                $row['nom'],
                $row['adresse']
            );
        }

        return $salles;
    }

    // Chercher une salle
    public function getById($id)
    {
        $sql = "SELECT * FROM salle WHERE salle_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {

            return new Salle(
                $row['salle_id'],
                $row['nom'],
                $row['adresse']
            );
        }

        return null;
    }

    // Ajouter une salle
    public function create(Salle $salle)
    {
        $sql = "INSERT INTO salle(nom, adresse)
                VALUES(:nom, :adresse)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nom' => $salle->getNom(),
            ':adresse' => $salle->getAdresse()
        ]);
    }

    // Modifier une salle
    public function update(Salle $salle)
    {
        $sql = "UPDATE salle
                SET nom = :nom,
                    adresse = :adresse
                WHERE salle_id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nom' => $salle->getNom(),
            ':adresse' => $salle->getAdresse(),
            ':id' => $salle->getSalleId()
        ]);
    }

    // Supprimer une salle
    public function delete($id)
    {
        $sql = "DELETE FROM salle WHERE salle_id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}