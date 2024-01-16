<?php
require_once __DIR__ . '/../../bootstrap/app.php';

// Auth
//Auth::isAuthOrRedirect();

$controller = new \App\Controllers\admin\AdminController();
$controller->index();

// Remove errors, success and old data
App::terminate();
