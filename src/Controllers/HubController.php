<?php

namespace App\Controllers;

use App\Models\Hub;

class HubController
{
    const URL_INDEX = '/hub.php';
    const URL_HANDLER = '/handlers/hub-handler.php';

    /**
     * Get all request to join connected user's room through ajax request
     */
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
        Hub::requestToJoinRoomAjax($idUser);

        exit();
    }

    /**
     * Get notified if current user's got accepted into a room through ajax request
     */
    public function joined()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST"){
            exit();
        }
        if (empty($_SESSION["user"])) {
            exit();
        }

        $idUser = $_SESSION["user"];

        // Delete the room in DB
        Hub::joinedRoomAjax($idUser);

        exit();
    }

}
?>