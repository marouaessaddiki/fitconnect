<?php

require_once "../../app/Controllers/AdherentController.php";

$controller = new AdherentController();

if (isset($_GET['id'])) {

    $controller->destroy($_GET['id']);

}

header("Location: index.php");
exit();