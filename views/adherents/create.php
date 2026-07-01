<?php

require_once "../views/partials/header.php";
require_once "../views/partials/navbar.php";

?>

<h1>Nouvel adhérent</h1>

<form method="post">

<input type="text" name="nom" placeholder="Nom">

<br>

<input type="text" name="prenom" placeholder="Prénom">

<br>

<input type="email" name="email" placeholder="Email">

<br>

<input type="text" name="telephone" placeholder="Téléphone">

<br>

<button type="submit">

Enregistrer

</button>

</form>

<?php require_once "../views/partials/footer.php"; ?>