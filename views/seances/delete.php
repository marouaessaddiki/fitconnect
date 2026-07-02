<?php

echo "Avant Controller<br>";

require_once "../../app/Controllers/SeanceController.php";

echo "Après require<br>";

$controller = new SeanceController();

echo "Controller créé<br>";

if (isset($_GET["id"])) {

    echo "ID = " . $_GET["id"] . "<br>";

    $controller->destroy($_GET["id"]);

    echo "Suppression OK";
}

exit();