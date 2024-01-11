<?php
require_once __DIR__.'/../../bootstrap/app.php';

require_once __DIR__ . "/../../src/Controllers/RoomsController.php";


if (!empty($_POST['action'])) {
    $controller = new App\Controllers\RoomsController();

    if ($_POST['action'] === 'create') {
        $controller->create();
    }
}

// Unknown action
$url = App\Controllers\RoomsController::URL_INDEX;
header("Location: $url");
exit();