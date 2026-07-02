<?php

require_once "../../app/Controllers/AdherentController.php";
require_once "../../app/Entities/Adherent.php";

$controller = new AdherentController();

// Vérifier si l'ID existe
if (!isset($_GET['id'])) {
    die("ID introuvable.");
}

$id = $_GET['id'];

$adherent = $controller->show($id);

if (!$adherent) {
    die("Adhérent introuvable.");
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adherent->setNom($_POST['nom']);
    $adherent->setPrenom($_POST['prenom']);
    $adherent->setEmail($_POST['email']);
    $adherent->setTelephone($_POST['telephone']);
    $adherent->setDateInscription($_POST['date_inscription']);
    $adherent->setIdAbonnement($_POST['id_abonnement']);
    $adherent->setSalleId($_POST['salle_id']);

    $controller->update($adherent);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un adhérent</title>

        <style>
        :root {
            --primary: #ff4500;
            --primary-dark: #d63a00;
            --secondary: #00e676;
            --dark: #0d1117;
            --dark-2: #161b22;
            --gray: #8b949e;
            --light: #f5f5f5;
            --danger: #ff3b3b;
            --radius: 10px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            margin: 0;
            padding: 40px 20px;
            background: linear-gradient(135deg, var(--dark) 0%, var(--dark-2) 100%);
            color: var(--light);
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 800;
            font-size: 2rem;
            color: var(--light);
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }

        h1::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        a {
            text-decoration: none;
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            padding: 10px 20px;
            border-radius: var(--radius);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 12px rgba(255, 69, 0, 0.3);
        }

        a:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 69, 0, 0.45);
        }

        body > a[href="index.php"] {
            background: transparent;
            border: 2px solid var(--gray);
            color: var(--gray);
            box-shadow: none;
        }

        body > a[href="index.php"]:hover {
            border-color: var(--secondary);
            color: var(--secondary);
        }

        form {
            max-width: 480px;
            margin: 0 auto;
            background: var(--dark-2);
            padding: 35px;
            border-radius: var(--radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border-top: 4px solid var(--primary);
        }

        label {
            display: block;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            color: var(--secondary);
            margin-bottom: 8px;
            margin-top: 15px;
        }

        select,
        input[type="date"],
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 12px 14px;
            background: var(--dark);
            border: 2px solid #30363d;
            border-radius: var(--radius);
            color: var(--light);
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s ease;
        }

        select:focus,
        input[type="date"]:focus,
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus {
            border-color: var(--primary);
        }

        select option {
            background: var(--dark-2);
        }

        button[type="submit"] {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            background: linear-gradient(135deg, var(--secondary), #00b359);
            color: #05130a;
            border: none;
            border-radius: var(--radius);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 230, 118, 0.35);
        }

        button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 230, 118, 0.5);
        }

        p[style*="color:red"] {
            max-width: 480px;
            margin: 0 auto 15px auto;
            background: rgba(255, 59, 59, 0.15) !important;
            border: 1px solid var(--danger);
            padding: 12px 16px;
            border-radius: var(--radius);
            color: #ff8080 !important;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>

<h1>Modifier un adhérent</h1>

<form method="POST">

    <label>Nom</label><br>
    <input type="text" name="nom" value="<?= $adherent->getNom(); ?>" required><br><br>

    <label>Prénom</label><br>
    <input type="text" name="prenom" value="<?= $adherent->getPrenom(); ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $adherent->getEmail(); ?>" required><br><br>

    <label>Téléphone</label><br>
    <input type="text" name="telephone" value="<?= $adherent->getTelephone(); ?>" required><br><br>

    <label>Date d'inscription</label><br>
    <input type="date" name="date_inscription"
           value="<?= $adherent->getDateInscription(); ?>" required><br><br>

    <label>ID Abonnement</label><br>
    <input type="number" name="id_abonnement"
           value="<?= $adherent->getIdAbonnement(); ?>" required><br><br>

    <label>ID Salle</label><br>
    <input type="number" name="salle_id"
           value="<?= $adherent->getSalleId(); ?>" required><br><br>

    <button type="submit">Modifier</button>

</form>

<br>

<a href="index.php">Retour</a>

</body>
</html>