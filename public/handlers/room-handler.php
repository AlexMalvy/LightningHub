<?php
require_once __DIR__.'/../../bootstrap/app.php';

<<<<<<< HEAD
require_once __DIR__ . "/../../src/Controllers/RoomsController.php";

=======
>>>>>>> 8fb5e3dcf156fd3bcbe1757fa05429256dd6100d

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
        $controller->leave();
    }
    if ($_POST['action'] === 'promote') {
        $controller->promote();
    }
    if ($_POST['action'] === 'kick') {
        $controller->kick();
    }
    if ($_POST['action'] === 'join') {
        $controller->join();
    }
    if ($_POST['action'] === 'cancel') {
        $controller->cancel();
    }
}

// Unknown action
$url = App\Controllers\RoomsController::URL_INDEX;
header("Location: $url");
exit();