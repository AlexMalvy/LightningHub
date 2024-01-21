<?php
require_once __DIR__.'/../../bootstrap/app.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new App\Controllers\HubController();
    $content = trim(file_get_contents("php://input"));
    $data = json_decode($content, true);
    $action = $data["action"];
    
    if ($action === 'request') {
        $controller->request();
    }
    
    if ($action === 'joined') {
        $controller->joined();
    }
}

// Unknown action
$url = App\Controllers\HubController::URL_INDEX;
header("Location: $url");
exit();
