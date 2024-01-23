<?php

namespace App\Controllers;


use App\Models\Filters;
use App\Models\Room;

class RoomsController
{
    const URL_INDEX = '/hub.php';
    const URL_HANDLER = '/handlers/product-handler.php';

    /**
     * Create a room with the current user as the owner
     */
    public function create()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST['room_title']) or empty($_POST['room_game_type_id']) or $_POST['room_game_type_id'] == "null") {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $title = strip_tags($_POST["room_title"]);
        $description = strip_tags($_POST["description"]) ?? "";

        if (strlen($title) <= 0 or strlen($title) > 50 or strlen($description) > 255) {
            $_SESSION["message"] = "Le titre ou la description est trop longue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $maxMembers = intval($_POST["room_number_player"]);
        if ($maxMembers <= 1 or $maxMembers > 10) {
            $maxMembers = 5;
        }

        $game = $_POST["room_game"];
        $gamemode = $_POST["room_game_type"];
        $gamemodeId = intval($_POST["room_game_type_id"]);

        $filters = new Filters;
        $gameInfo = $filters->getGameNameAndGamemodeNameFromGamemodeId($gamemodeId);
        if ($gameInfo["gameName"] != $game or $gameInfo["gamemodeName"] != $gamemode) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        // Insert the room in DB
        Room::createNewRoom($idUser, $title, $description, $maxMembers, $gamemodeId);

        $_SESSION["message"] = "Vous avez créer le salon ".$title.".";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

    /**
     * Modify the current user's room
     */
    public function modify()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"] or empty($_POST['room_game_type_id']) or empty($_POST['room_title']))) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = $_POST["room_id"];
        if (!Room::checkUserOwnership($idUser, $idRoom)) {
            $_SESSION["message"] = "Vous n'êtes pas le propiétaire de ce salon.";
            $_SESSION["type"] = "danger";
            header("Location: $index");
            exit();
        }

        $title = strip_tags($_POST["room_title"]);
        $description = strip_tags($_POST["description"]) ?? "";

        if (strlen($title) <= 0 or strlen($title) > 50 or strlen($description) > 255) {
            $_SESSION["message"] = "Le titre ou la description est trop longue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }


        $maxMembers = intval($_POST["room_number_player"]);
        if ($maxMembers <= 1 or $maxMembers > 10) {
            $maxMembers = 5;
        }

        $gamemodeId = intval($_POST["room_game_type_id"]);
        $game = $_POST["room_game"];
        $gamemode = $_POST["room_game_type"];
        $gamemodeId = intval($_POST["room_game_type_id"]);

        $filters = new Filters;
        $gameInfo = $filters->getGameNameAndGamemodeNameFromGamemodeId($gamemodeId);
        if ($gameInfo["gameName"] != $game or $gameInfo["gamemodeName"] != $gamemode) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        // Update the room in DB
        Room::modifyRoom($idRoom, $title, $description, $maxMembers, $gamemodeId);

        $_SESSION["message"] = "Le salon ".$title." a été modifié.";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

    /**
     * Delete the current user's room
     */
    public function delete()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = intval($_POST["room_id"]);
        if (!Room::checkUserOwnership($idUser, $idRoom)) {
            $_SESSION["message"] = "Vous n'êtes pas le propiétaire de ce salon.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        // Delete the room in DB
        Room::deleteRoom($idRoom);

        $_SESSION["message"] = "Le salon a bien été fermé.";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

    /**
     * Leave the current room for current user
     */
    public function leave()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = intval($_POST["room_id"]);

        // Delete the room in DB
        Room::leaveRoom($idUser, $idRoom);

        $_SESSION["message"] = "Vous avez quitté votre salon.";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

    /**
     * Promote to room owner the target user
     */
    public function promote()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["targetId"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idTarget = intval($_POST["targetId"]);

        // Delete the room in DB
        Room::promoteToOwner($idUser, $idTarget);

        header("Location: $index");
        exit();
    }

    /**
     * Kick the target user from the room
     */
    public function kick()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["targetId"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idTarget = intval($_POST["targetId"]);

        // Delete the room in DB
        Room::kickFromRoom($idUser, $idTarget);

        header("Location: $index");
        exit();
    }

    /**
     * Send a request to join target room for connected user
     */
    public function join()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = intval($_POST["room_id"]);

        // Delete the room in DB
        Room::RequestToJoinRoom($idUser, $idRoom);

        header("Location: $index");
        exit();
    }

    /**
     * Cancel request to join target room for connected user
     */
    public function cancel()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = intval($_POST["room_id"]);

        // Delete the room in DB
        Room::cancelRequestToJoinRoom($idUser, $idRoom);

        header("Location: $index");
        exit();
    }

    /**
     * Accept into the room target user
     */
    public function accept()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["targetId"]) or empty($_POST["room_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idTarget = intval($_POST["targetId"]);
        $idRoom = intval($_POST["room_id"]);

        // Delete the room in DB
        Room::acceptIntoRoom($idUser, $idTarget, $idRoom);

        header("Location: $index");
        exit();
    }

    /**
     * Decline request to join the room of target user
     */
    public function decline()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["targetId"]) or empty($_POST["room_id"])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idTarget = intval($_POST["targetId"]);
        $idRoom = intval($_POST["room_id"]);

        // Delete the room in DB
        Room::declineIntoRoom($idUser, $idTarget, $idRoom);

        header("Location: $index");
        exit();
    }
}

?>