<?php

require_once "../../config/Database.php";
require_once "../../app/Controllers/SeanceController.php";
require_once "../../app/Entities/Seance.php";

$db = new Database();
$conn = $db->connect();

$adherents = $conn->query("SELECT id_adherent, nom, prenom FROM adherent")->fetchAll(PDO::FETCH_ASSOC);
$salles = $conn->query("SELECT salle_id, nom FROM salle")->fetchAll(PDO::FETCH_ASSOC);

$controller = new SeanceController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $seance = new Seance(
        null,
        $_POST["date"],
        $_POST["duree"],
        $_POST["activite"],
        $_POST["equipement"],
        $_POST["id_adherent"],
        $_POST["salle_id"]
    );

    try {

        $controller->store($seance);

        header("Location: index.php");
        exit();

    } catch (Exception $e) {

        echo "<p style='color:red'>" . $e->getMessage() . "</p>";

    }

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>Ajouter une séance</title>

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

<h1>Ajouter une séance</h1>

<form method="POST">

<label>Date</label><br>
<input type="date" name="date" required>

<br><br>

<label>Durée (minutes)</label><br>
<input type="number" name="duree" required>

<br><br>

<label>Activité</label><br>
<input type="text" name="activite" required>

<br><br>

<label>Équipement</label><br>
<input type="text" name="equipement">

<br><br>

<label>Adhérent</label><br>

<select name="id_adherent" required>

<?php foreach($adherents as $adherent): ?>

<option value="<?= $adherent['id_adherent']; ?>">

<?= $adherent['nom']; ?> <?= $adherent['prenom']; ?>

</option>

<?php endforeach; ?>

</select>

<br><br>

<label>Salle</label><br>

<select name="salle_id" required>

<?php foreach($salles as $salle): ?>

<option value="<?= $salle['salle_id']; ?>">

<?= $salle['nom']; ?>

</option>

<?php endforeach; ?>

</select>

<br><br>

<button type="submit">

Ajouter

</button>

</form>

<br>

<a href="index.php">

Retour

</a>

</body>
</html>