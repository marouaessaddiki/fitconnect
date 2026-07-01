<?php
require_once "../views/partials/header.php";
require_once "../views/partials/navbar.php";
?>

<h1>Modifier un Adhérent</h1>

<form action="../public/index.php?page=updateAdherent" method="POST">

    <!-- ID caché -->
    <input
        type="hidden"
        name="id_adherent"
        value="<?= htmlspecialchars($adherent['id_adherent']) ?>"
    >

    <label>Nom :</label><br>

    <input
        type="text"
        name="nom"
        value="<?= htmlspecialchars($adherent['nom']) ?>"
        required
    >

    <br><br>

    <label>Prénom :</label><br>

    <input
        type="text"
        name="prenom"
        value="<?= htmlspecialchars($adherent['prenom']) ?>"
        required
    >

    <br><br>

    <label>Email :</label><br>

    <input
        type="email"
        name="email"
        value="<?= htmlspecialchars($adherent['email']) ?>"
        required
    >

    <br><br>

    <label>Téléphone :</label><br>

    <input
        type="text"
        name="telephone"
        value="<?= htmlspecialchars($adherent['telephone']) ?>"
        required
    >

    <br><br>

    <label>Date d'inscription :</label><br>

    <input
        type="date"
        name="date_inscription"
        value="<?= htmlspecialchars($adherent['date_inscription']) ?>"
        required
    >

    <br><br>

    <label>Salle :</label><br>

    <select name="salle_id" required>

        <option value="1"
        <?= ($adherent['salle_id'] == 1) ? 'selected' : '' ?>>
            Salle 1
        </option>

        <option value="2"
        <?= ($adherent['salle_id'] == 2) ? 'selected' : '' ?>>
            Salle 2
        </option>

        <option value="3"
        <?= ($adherent['salle_id'] == 3) ? 'selected' : '' ?>>
            Salle 3
        </option>

        <option value="4"
        <?= ($adherent['salle_id'] == 4) ? 'selected' : '' ?>>
            Salle 4
        </option>

    </select>

    <br><br>

    <button type="submit">

        Modifier

    </button>

    <a href="../public/index.php?page=adherents">

        Annuler

    </a>

</form>

<?php
require_once "../views/partials/footer.php";
?>