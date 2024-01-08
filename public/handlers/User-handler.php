<?php
require_once __DIR__.'/../../bootstrap/app.php';

if (!empty($_POST['action'])) {
    $controller = new controller\UserController();

    if ($_POST['action'] === 'store') {
        //Auth::isGuestOrRedirect(); // Check guest only
        $controller->store();
    }
}

