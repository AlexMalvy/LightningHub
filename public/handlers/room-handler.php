<?php
require_once __DIR__.'/../../bootstrap/app.php';

require_once __DIR__."/../../src/Controller/RoomsController.php";


if (!empty($_POST['action'])) {
    $controller = new App\Controller\RoomsController();

    if ($_POST['action'] === 'create') {
        $controller->create();
    }
}

// Unknown action
$url = App\Controller\RoomsController::URL_INDEX;
header("Location: $url");
exit();