<?php

require_once "../app/Controllers/SalleController.php";

$controller = new SalleController();

$salles = $controller->index();

foreach ($salles as $salle) {

    echo $salle->getSalleId() . " - ";
    echo $salle->getNom() . " - ";
    echo $salle->getAdresse() . "<br>";
}