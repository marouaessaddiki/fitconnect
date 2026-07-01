<?php

require_once "../views/partials/header.php";
require_once "../views/partials/navbar.php";

?>

<h1>Liste des adhérents</h1>

<a href="create.php">Ajouter un adhérent</a>

<table>

<tr>

<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Email</th>
<th>Téléphone</th>

</tr>

<?php foreach($adherents as $adherent): ?>

<tr>

<td><?= $adherent['id_adherent']; ?></td>

<td><?= $adherent['nom']; ?></td>

<td><?= $adherent['prenom']; ?></td>

<td><?= $adherent['email']; ?></td>

<td><?= $adherent['telephone']; ?></td>

</tr>

<?php endforeach; ?>

</table>

<?php require_once "../views/partials/footer.php"; ?>