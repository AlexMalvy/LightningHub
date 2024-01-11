<?php
require_once __DIR__.'/../../bootstrap/app.php';
require_once base_path('Controllers/PrivateMessageController.php');

// Auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new Controllers\PrivateMessageController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(Controllers\PrivateMessageController::URL_INDEX);
