<?php

namespace App\Controllers;

use App\Models\RoomMessage;

class RoomMessageController
{
    const URL_INDEX = '/hub.php';

    /**
     * Send a message into the user's current room
     */
    public function send()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["message"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $message = strip_tags($_POST["message"]);

        if (strlen($message) > 2000) {
            $_SESSION["message"] = "Le message est trop long.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        // Delete the room in DB
        RoomMessage::sendMessage($idUser, $message);

        header("Location: $index");
        exit();
    }
    
    /**
     * Report the target message in connected user's room
     */
    public function report()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["message_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idMessage = intval($_POST["message_id"]);

        // Delete the room in DB
        RoomMessage::reportMessage($idUser, $idMessage);
        
        $_SESSION["message"] = "Le message a bien été signalé.";
        $_SESSION["type"] = "success";

        header("Location: $index");
        exit();
    }
}

?>