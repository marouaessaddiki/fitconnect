<?php

require_once "../../app/Controllers/SalleController.php";

$controller = new SalleController();
$salles = $controller->index();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste des salles</title>

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

        a:active {
            transform: translateY(0);
        }

        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0;
            background: var(--dark-2);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        table, th, td {
            border: none;
        }

        th {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            padding: 14px 10px;
        }

        td {
            padding: 14px 10px;
            text-align: center;
            border-bottom: 1px solid #21262d;
            color: var(--light);
            font-size: 0.95rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: rgba(255, 69, 0, 0.08);
        }

        td a {
            padding: 6px 14px;
            font-size: 0.75rem;
            margin: 2px;
            box-shadow: none;
        }

        td a[href*="delete"] {
            background: linear-gradient(135deg, var(--danger), #b30000);
        }

        td a[href*="edit"] {
            background: linear-gradient(135deg, var(--secondary), #00b359);
            color: #05130a;
        }

        body > a[href="create.php"] {
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

<h1>Liste des salles</h1>

<br>

<a href="create.php">Ajouter une salle</a>

<br><br>

<table>

<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Adresse</th>
    <th>Actions</th>
</tr>

<?php foreach($salles as $salle): ?>

<tr>

    <td><?= htmlspecialchars($salle->getSalleId()) ?></td>
    <td><?= htmlspecialchars($salle->getNom()) ?></td>
    <td><?= htmlspecialchars($salle->getAdresse()) ?></td>

    <td>

        <a href="edit.php?id=<?= $salle->getSalleId() ?>">
            Modifier
        </a>

        |

        <a href="delete.php?id=<?= $salle->getSalleId() ?>"
           onclick="return confirm('Voulez-vous supprimer cette salle ?');">

            Supprimer

        </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>