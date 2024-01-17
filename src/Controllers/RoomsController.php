<?php

namespace App\Controllers;


use App\Models\Filters;
use App\Models\Room;

class RoomsController
{
    const URL_INDEX = '/hub.php';
    const URL_HANDLER = '/handlers/product-handler.php';

    public function create()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST['room_title']) or empty($_POST['room_game_type'])) {
            $_SESSION["message"] = "Une erreur est survenue.";
            $_SESSION["type"] = "warning";
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $title = strip_tags($_POST["room_title"]);
        $description = strip_tags($_POST["description"]) ?? "";

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

        $_SESSION["message"] = "Le salon ".$title." a été modifier.";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

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

        $_SESSION["message"] = "Le salon a bien été fermer.";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

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

        $_SESSION["message"] = "Vous avez quitter votre salon.";
        $_SESSION["type"] = "success";
        header("Location: $index");
        exit();
    }

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

    public function accept()
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
        Room::acceptIntoRoom($idUser, $idTarget);

        header("Location: $index");
        exit();
    }
}

?>