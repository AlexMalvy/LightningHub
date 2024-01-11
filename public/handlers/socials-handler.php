<?php
require_once __DIR__.'/../../bootstrap/app.php';
//require_once base_path('Controller/SocialsController.php');

// Auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new App\Controller\SocialsController();

    if ($_POST['action'] === 'update') {
        $controller->update();
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete();
    } elseif ($_POST['action'] === 'store') {
        $controller->store();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(App\Controller\SocialsController::URL_INDEX);
