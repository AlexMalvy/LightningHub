<?php
require_once __DIR__ . '/../../bootstrap/app.php';

use App\Controllers\admin\ModerationController;

if (!empty($_POST['action'])) {

    if ($_POST['action'] === 'moderation') {
        ModerationController::storeBan();
    }
}
