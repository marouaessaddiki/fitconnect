<?php

require_once "../../app/Controllers/SalleController.php";

$controller = new SalleController();

if (isset($_GET["id"])) {
    $controller->destroy($_GET["id"]);
}

header("Location: index.php");
exit();