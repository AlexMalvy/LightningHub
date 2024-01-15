<?php
require_once __DIR__.'/../../bootstrap/app.php';

require_once __DIR__ . "/../../src/Controllers/UserController.php";


if (!empty($_POST['action'])) {

    if ($_POST['action'] === 'store') {
        $controller = new App\Controllers\UserController();
        $controller->store();
    } elseif ($_POST['action'] === 'login') {
        $controller = new App\Controllers\AuthController();
        $controller->login();
    } elseif ($_POST['action'] === 'logout') {
        $controller = new App\Controllers\AuthController();
        $controller->logout();
    } elseif ($_POST['action'] === 'deleteaccount') {
        $controller = new App\Controllers\UserController();
        $controller->delete();
    }elseif ($_POST['action'] === 'picture') {
        $controller = new App\Controllers\UserController();
        $controller->savePicture();
    }elseif ($_POST['action'] === 'idGame') {


        \App\Controllers\PlayGamesController::updateInsGameUserName(intval($_GET['idUser']), intval($_GET['idGame']));
    }

}

