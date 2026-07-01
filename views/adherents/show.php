<?php
require_once "../views/partials/header.php";
require_once "../views/partials/navbar.php";
?>

<h1>Détails de l'Adhérent</h1>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($adherent['id_adherent']) ?></td>
    </tr>

    <tr>
        <th>Nom</th>
        <td><?= htmlspecialchars($adherent['nom']) ?></td>
    </tr>

    <tr>
        <th>Prénom</th>
        <td><?= htmlspecialchars($adherent['prenom']) ?></td>
    </tr>

    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($adherent['email']) ?></td>
    </tr>

    <tr>
        <th>Téléphone</th>
        <td><?= htmlspecialchars($adherent['telephone']) ?></td>
    </tr>

    <tr>
        <th>Date d'inscription</th>
        <td><?= htmlspecialchars($adherent['date_inscription']) ?></td>
    </tr>

    <tr>
        <th>Salle</th>
        <td><?= htmlspecialchars($adherent['salle_id']) ?></td>
    </tr>

</table>

<br>

<a href="../public/index.php?page=editAdherent&id=<?= $adherent['id_adherent'] ?>">
    Modifier
</a>

|

<a href="../public/index.php?page=deleteAdherent&id=<?= $adherent['id_adherent'] ?>"
   onclick="return confirm('Voulez-vous vraiment supprimer cet adhérent ?');">
    Supprimer
</a>

|

<a href="../public/index.php?page=adherents">
    Retour à la liste
</a>

<?php
require_once "../views/partials/footer.php";
?>