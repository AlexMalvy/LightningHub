<?php
require_once __DIR__.'/../../bootstrap/app.php';
//require_once base_path('src/Controllers/PrivateMessageController.php');

// Auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new App\Controllers\PrivateMessageController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
       // $controller->delete();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(App\Controllers\PrivateMessageController::URL_INDEX);
