<?php

require_once "../app/Controllers/AdherentController.php";

try {

    $controller = new AdherentController();

    $adherents = $controller->index();

    echo "<pre>";
    print_r($adherents);
    echo "</pre>";

} catch (Exception $e) {

    echo $e->getMessage();
}