<?php
require_once __DIR__ . '/../../bootstrap/app.php';

use App\Controllers\admin\BanController;

if (!empty($_POST['action'])) {

    if ($_POST['action'] === 'moderation') {
        BanController::storeBan();
    }
}
