<?php
require_once __DIR__ . '/../../bootstrap/app.php';


$controller = new \App\Controllers\admin\FaqController();
$controller->index();

// Remove errors, success and old data
App::terminate();
