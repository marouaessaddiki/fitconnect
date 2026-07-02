<?php

require_once "../../app/Controllers/AbonnementController.php";
require_once "../../app/Entities/Abonnement.php";

$controller = new AbonnementController();

if (!isset($_GET['id'])) {
    die("ID introuvable.");
}

$id = $_GET['id'];

$abonnement = $controller->show($id);

if (!$abonnement) {
    die("Abonnement introuvable.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $abonnement->setType($_POST["type"]);
    $abonnement->setDateDebut($_POST["date_debut"]);
    $abonnement->setDateFin($_POST["date_fin"]);

    try {

        $controller->update($abonnement);

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
    <title>Modifier un abonnement</title>

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
        input[type="date"] {
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
        input[type="date"]:focus {
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

<h1>Modifier un abonnement</h1>

<form method="POST">

<label>Type</label><br>

<select name="type" required>

<option value="Mensuel" <?= $abonnement->getType()=="Mensuel"?"selected":"" ?>>
Mensuel
</option>

<option value="Trimestriel" <?= $abonnement->getType()=="Trimestriel"?"selected":"" ?>>
Trimestriel
</option>

<option value="Annuel" <?= $abonnement->getType()=="Annuel"?"selected":"" ?>>
Annuel
</option>

</select>

<br><br>

<label>Date début</label><br>
<input
type="date"
name="date_debut"
value="<?= $abonnement->getDateDebut(); ?>"
required>

<br><br>

<label>Date fin</label><br>
<input
type="date"
name="date_fin"
value="<?= $abonnement->getDateFin(); ?>"
required>

<br><br>

<button type="submit">
Modifier
</button>

</form>

<br>

<a href="index.php">
Retour
</a>

</body>
</html>