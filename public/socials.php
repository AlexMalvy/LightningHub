<?php
require_once __DIR__.'/../bootstrap/app.php';

// Auth
//Auth::isAuthOrRedirect();

//require_once base_path('App/Controller/RoomsController.php');
$controller = new App\Controllers\SocialsController();
$controller->index();

// Remove errors, success and old data
App::terminate();
