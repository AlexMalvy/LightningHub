<?php
require_once __DIR__.'/../../bootstrap/app.php';

if (!empty($_POST['action'])) {

    if ($_POST['action'] === 'store') {
        $controller = new controller\UserController();
        $controller->store();
    } elseif ($_POST['action'] === 'login') {
        $controller = new controller\AuthController();
        $controller->login();
    } elseif ($_POST['action'] === 'logout') {
        $controller = new controller\AuthController();
        $controller->logout();
    } elseif ($_POST['action'] === 'deleteaccount') {
        $controller = new controller\UserController();
        $controller->delete();
    }

}

