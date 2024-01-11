<?php
require_once __DIR__.'/../bootstrap/app.php';

// Auth
//Auth::isAuthOrRedirect();

require_once base_path('Controllers/SocialsController.php');
$controller = new Controllers\SocialsController();
$controller->index();

// Remove errors, success and old data
App::terminate();
