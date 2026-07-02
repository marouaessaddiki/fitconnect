<?php

require_once "../../app/Controllers/AbonnementController.php";

$controller = new AbonnementController();

if (isset($_GET["id"])) {

    $controller->destroy($_GET["id"]);

}

header("Location: index.php");
exit();