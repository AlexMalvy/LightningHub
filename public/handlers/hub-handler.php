<?php
require_once __DIR__.'/../../bootstrap/app.php';


// if (!empty($_POST['action'])) {
//     $controller = new App\Controllers\HubController();

//     if ($_POST['action'] === 'request') {
//         $controller->request();
//     }
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new App\Controllers\HubController();
    $content = trim(file_get_contents("php://input"));
    $data = json_decode($content, true);
    $action = $data["action"];
    
    if ($action === 'request') {
        $controller->request();
    }
}

// Unknown action
$url = App\Controllers\HubController::URL_INDEX;
header("Location: $url");
exit();
