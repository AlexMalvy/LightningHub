<?php
require_once __DIR__.'/../bootstrap/app.php';

// Guest or Auth allowed

require_once base_path('Controllers/WelcomeController.php');
$controller = new Controllers\WelcomeController();
$controller->index();

// Remove errors, success and old data
App::terminate();
