<?php
require_once __DIR__.'/../../bootstrap/app.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new App\Controllers\RoomChatController();
    $content = trim(file_get_contents("php://input"));
    $data = json_decode($content, true);
    $action = $data["action"];
    
    if ($action === 'messages') {
        $controller->messages();
    }
    exit();
}

// Unknown action
$url = App\Controllers\RoomChatController::URL_INDEX;
header("Location: $url");
exit();