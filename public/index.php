<?php

require_once "../app/Controllers/AdherentController.php";
require_once "../app/Entities/Adherent.php";

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    // =========================
    // Dashboard
    // =========================
    case 'dashboard':
        require_once "../views/dashboard/index.php";
        break;

    // =========================
    // Liste des adhérents
    // =========================
    case 'adherents':

        $controller = new AdherentController();

        $adherents = $controller->index();

        require_once "../views/adherents/index.php";

        break;

    // =========================
    // Formulaire d'ajout
    // =========================
  case 'createAdherent':

    require_once "../views/adherents/create.php";

    break;

    // =========================
    // Enregistrer
    // =========================
    case 'storeAdherent':

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $controller = new AdherentController();

        $adherent = new Adherent(

            null,

            trim($_POST['nom']),
            trim($_POST['prenom']),
            trim($_POST['email']),
            trim($_POST['telephone']),
            $_POST['date_inscription'],
            $_POST['salle_id']

        );

        $controller->store($adherent);

        header("Location: index.php?page=adherents");

        exit;
    }

    break;

    // =========================
    // Afficher un adhérent
    // =========================
    case 'showAdherent':

    $controller = new AdherentController();

    $adherent = $controller->show($_GET['id']);

    require_once "../views/adherents/show.php";

    break;

    // =========================
    // Modifier
    // =========================
   case 'editAdherent':

    $controller = new AdherentController();

    $adherent = $controller->show($_GET['id']);

    require_once "../views/adherents/edit.php";

    break;

    // =========================
    // Sauvegarder modification
    // =========================
   case 'updateAdherent':

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $controller = new AdherentController();

        $adherent = new Adherent(

            $_POST['id_adherent'],

            trim($_POST['nom']),
            trim($_POST['prenom']),
            trim($_POST['email']),
            trim($_POST['telephone']),
            $_POST['date_inscription'],
            $_POST['salle_id']

        );

        $controller->update($adherent);

        header("Location:index.php?page=adherents");

        exit;
    }

    break;

    // =========================
    // Supprimer
    // =========================
    case 'deleteAdherent':

    if(isset($_GET['id']))
    {

        $controller = new AdherentController();

        $controller->delete($_GET['id']);

    }

    header("Location:index.php?page=adherents");

    exit;

    // =========================
    // Page inconnue
    // =========================
    default:

        echo "<h2>Page introuvable !</h2>";

        break;
}