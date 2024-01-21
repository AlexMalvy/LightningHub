<?php

namespace App\Controllers;

use App\Models\RoomChat;

class RoomChatController
{
    const URL_INDEX = '/hub.php';
    const URL_HANDLER = '/handlers/hub-handler.php';

    public function messages()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST"){
            exit();
        }
        if (empty($_SESSION["user"])) {
            exit();
        }

        $idUser = $_SESSION["user"];

        // Delete the room in DB
        RoomChat::messagesAjax($idUser);

        exit();
    }

}
?>