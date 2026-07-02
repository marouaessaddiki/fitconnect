<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Abonnement.php';

class AbonnementRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Récupérer tous les abonnements
    public function getAll()
    {
        $sql = "SELECT * FROM abonnement";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $abonnements = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $abonnements[] = new Abonnement(
                $row['id_abonnement'],
                $row['type'],
                $row['date_debut'],
                $row['date_fin']
            );
        }

        return $abonnements;
    }

    // Récupérer un abonnement par ID
    public function getById($id)
    {
        $sql = "SELECT * FROM abonnement WHERE id_abonnement = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Abonnement(
                $row['id_abonnement'],
                $row['type'],
                $row['date_debut'],
                $row['date_fin']
            );
        }

        return null;
    }

    // Ajouter
    public function create(Abonnement $abonnement)
    {
        $sql = "INSERT INTO abonnement(type, date_debut, date_fin)
                VALUES(:type, :date_debut, :date_fin)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':type' => $abonnement->getType(),
            ':date_debut' => $abonnement->getDateDebut(),
            ':date_fin' => $abonnement->getDateFin()
        ]);
    }

    // Modifier
    public function update(Abonnement $abonnement)
    {
        $sql = "UPDATE abonnement
                SET
                    type = :type,
                    date_debut = :date_debut,
                    date_fin = :date_fin
                WHERE id_abonnement = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':type' => $abonnement->getType(),
            ':date_debut' => $abonnement->getDateDebut(),
            ':date_fin' => $abonnement->getDateFin(),
            ':id' => $abonnement->getIdAbonnement()
        ]);
    }

    // Supprimer
    public function delete($id)
    {
        $sql = "DELETE FROM abonnement WHERE id_abonnement = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}