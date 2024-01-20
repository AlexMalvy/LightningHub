<?php
require_once __DIR__ . '/../../bootstrap/app.php';


if (!empty($_POST['action'])) {

    if ($_POST['action'] === 'create') {
        $controller = new \App\Controllers\admin\FaqController();
        $controller->storeFaq();
    }elseif ($_POST['action'] === 'update') {
        $controller = new \App\Controllers\admin\FaqController();
        $controller->updateFaq();
    }elseif ($_POST['action'] === 'createFaq') {
        $controller = new \App\Controllers\admin\FaqController();
        $controller->storeFaq();
    }elseif ($_POST['action'] === 'displayForm') {
        $controller = new \App\Controllers\admin\FaqController();
        $controller->displayCreateForm();
    }
}

if (!empty($_GET)) {
    $controller = new \App\Controllers\admin\FaqController();
    $controller->deleteFaq();
}

