<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Seance.php';

class SeanceRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Afficher toutes les séances
    public function getAll()
    {
        $sql = "SELECT * FROM seance";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $seances = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $seances[] = new Seance(
                $row['id_seance'],
                $row['date'],
                $row['duree'],
                $row['activite'],
                $row['equipement'],
                $row['id_adherent'],
                $row['salle_id']
            );
        }

        return $seances;
    }

    // Chercher une séance par ID
    public function getById($id)
    {
        $sql = "SELECT * FROM seance WHERE id_seance = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Seance(
                $row['id_seance'],
                $row['date'],
                $row['duree'],
                $row['activite'],
                $row['equipement'],
                $row['id_adherent'],
                $row['salle_id']
            );
        }

        return null;
    }

    // Ajouter une séance
    public function create(Seance $seance)
{
    $sql = "INSERT INTO seance
            (date, duree, activite, equipement, id_adherent, salle_id)
            VALUES
            (:date, :duree, :activite, :equipement, :id_adherent, :salle_id)";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':date' => $seance->getDateSeance(),
        ':duree' => $seance->getDuree(),
        ':activite' => $seance->getActivite(),
        ':equipement' => $seance->getEquipement(),
        ':id_adherent' => $seance->getIdAdherent(),
        ':salle_id' => $seance->getSalleId()
    ]);
}
 
    // Modifier une séance
    public function update(Seance $seance)
    {
        $sql = "UPDATE seance SET
                    date = :date,
                    duree = :duree,
                    activite = :activite,
                    equipement = :equipement,
                    id_adherent = :id_adherent,
                    salle_id = :salle_id
                WHERE id_seance = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':date' => $seance->getDateSeance(),
            ':duree' => $seance->getDuree(),
            ':activite' => $seance->getActivite(),
            ':equipement' => $seance->getEquipement(),
            ':id_adherent' => $seance->getIdAdherent(),
            ':salle_id' => $seance->getSalleId(),
            ':id' => $seance->getIdSeance()
        ]);
    }

    // Supprimer une séance
    public function delete($id)
    {
        $sql = "DELETE FROM seance WHERE id_seance = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}