<?php
require_once __DIR__.'/../../bootstrap/app.php';


if (!empty($_POST['action'])) {
    $controller = new App\Controllers\RoomMessageController();

    if ($_POST['action'] === 'send') {
        $controller->send();
    }
    if ($_POST['action'] === 'report') {
        $controller->report();
    }
}

// Unknown action
$url = App\Controllers\RoomMessageController::URL_INDEX;
header("Location: $url");
exit();
