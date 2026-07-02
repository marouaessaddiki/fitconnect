<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Entities/Adherent.php';

class AdherentRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Récupérer tous les adhérents
    public function getAll()
    {
        $sql = "SELECT * FROM adherent";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $adherents = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $adherents[] = new Adherent(
                $row['id_adherent'],
                $row['nom'],
                $row['prenom'],
                $row['email'],
                $row['telephone'],
                $row['date_inscription'],
                $row['id_abonnement'],
                $row['salle_id']
            );
        }

        return $adherents;
    }
    // Ajouter un adhérent
public function create(Adherent $adherent)
{
    $sql = "INSERT INTO adherent
            (nom, prenom, email, telephone, date_inscription, id_abonnement, salle_id)
            VALUES
            (:nom, :prenom, :email, :telephone, :date_inscription, :id_abonnement, :salle_id)";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':nom' => $adherent->getNom(),
        ':prenom' => $adherent->getPrenom(),
        ':email' => $adherent->getEmail(),
        ':telephone' => $adherent->getTelephone(),
        ':date_inscription' => $adherent->getDateInscription(),
        ':id_abonnement' => $adherent->getIdAbonnement(),
        ':salle_id' => $adherent->getSalleId()
    ]);
}
// Récupérer un adhérent par son ID
public function getById($id)
{
    $sql = "SELECT * FROM adherent WHERE id_adherent = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return new Adherent(
            $row['id_adherent'],
            $row['nom'],
            $row['prenom'],
            $row['email'],
            $row['telephone'],
            $row['date_inscription'],
            $row['id_abonnement'],
            $row['salle_id']
        );
    }

    return null;
}
// Modifier un adhérent
public function update(Adherent $adherent)
{
    $sql = "UPDATE adherent SET
                nom = :nom,
                prenom = :prenom,
                email = :email,
                telephone = :telephone,
                date_inscription = :date_inscription,
                id_abonnement = :id_abonnement,
                salle_id = :salle_id
            WHERE id_adherent = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':nom' => $adherent->getNom(),
        ':prenom' => $adherent->getPrenom(),
        ':email' => $adherent->getEmail(),
        ':telephone' => $adherent->getTelephone(),
        ':date_inscription' => $adherent->getDateInscription(),
        ':id_abonnement' => $adherent->getIdAbonnement(),
        ':salle_id' => $adherent->getSalleId(),
        ':id' => $adherent->getIdAdherent()
    ]);
}
// Supprimer un adhérent
public function delete($id)
{
    $sql = "DELETE FROM adherent WHERE id_adherent = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}
}