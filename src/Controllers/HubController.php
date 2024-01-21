<?php

namespace App\Controllers;

use App\Models\Hub;

class HubController
{
    const URL_INDEX = '/hub.php';
    const URL_HANDLER = '/handlers/hub-handler.php';

    public function request()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST"){
            exit();
        }
        if (empty($_SESSION["user"])) {
            exit();
        }

        $idUser = $_SESSION["user"];

        // Delete the room in DB
        Hub::RequestToJoinRoomAjax($idUser);

        exit();
    }

}
?>