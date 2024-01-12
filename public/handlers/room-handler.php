<?php
require_once __DIR__.'/../../bootstrap/app.php';


if (!empty($_POST['action'])) {
    $controller = new App\Controllers\RoomsController();

    if ($_POST['action'] === 'create') {
        $controller->create();
    }
    if ($_POST['action'] === 'modify') {
        $controller->modify();
    }
    if ($_POST['action'] === 'delete') {
        $controller->delete();
    }
    if ($_POST['action'] === 'leave') {
        // $controller->create();
    }
}

// Unknown action
$url = App\Controllers\RoomsController::URL_INDEX;
header("Location: $url");
exit();