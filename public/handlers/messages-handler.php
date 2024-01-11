<?php
require_once __DIR__.'/../../bootstrap/app.php';
require_once base_path('Controller/PrivateMessageController.php');

// Auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new App\Controller\PrivateMessageController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
       // $controller->delete();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(App\Controller\PrivateMessageController::URL_INDEX);
