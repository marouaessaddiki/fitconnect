<?php
require_once "../views/partials/header.php";
require_once "../views/partials/navbar.php";
?>

<h1>Liste des Adhérents</h1>

<p>
    <a href="../public/index.php?page=createAdherent">
        ➕ Ajouter un adhérent
    </a>
</p>

<table border="1" cellpadding="8" cellspacing="0">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date d'inscription</th>
            <th>Salle</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

        <?php if (!empty($adherents)): ?>

            <?php foreach ($adherents as $adherent): ?>

                <tr>

                    <td><?= htmlspecialchars($adherent['id_adherent']) ?></td>

                    <td><?= htmlspecialchars($adherent['nom']) ?></td>

                    <td><?= htmlspecialchars($adherent['prenom']) ?></td>

                    <td><?= htmlspecialchars($adherent['email']) ?></td>

                    <td><?= htmlspecialchars($adherent['telephone']) ?></td>

                    <td><?= htmlspecialchars($adherent['date_inscription']) ?></td>

                    <td><?= htmlspecialchars($adherent['salle_id']) ?></td>

                    <td>

                        <a href="../public/index.php?page=showAdherent&id=<?= $adherent['id_adherent'] ?>">
                            Voir
                        </a>

                        |

                        <a href="../public/index.php?page=editAdherent&id=<?= $adherent['id_adherent'] ?>">
                            Modifier
                        </a>

                        |

                        <a href="../public/index.php?page=deleteAdherent&id=<?= $adherent['id_adherent'] ?>"
                           onclick="return confirm('Voulez-vous vraiment supprimer cet adhérent ?');">
                            Supprimer
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="8" style="text-align:center;">
                    Aucun adhérent trouvé.
                </td>

            </tr>

        <?php endif; ?>

    </tbody>

</table>

<?php
require_once "../views/partials/footer.php";
?>