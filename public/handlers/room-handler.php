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
//        if ($_POST['type'] === 'admin'){
//            $controller->delete('admin');
//        }
//        $controller->delete('autre');
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
    if ($_POST['action'] === 'accept') {
        $controller->accept();
    }
    if ($_POST['action'] === 'decline') {
        $controller->decline();
    }
}

// Unknown action
$url = App\Controllers\RoomsController::URL_INDEX;
header("Location: $url");
exit();
