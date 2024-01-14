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
        if (empty($_POST['room_title']) or empty($_POST['room_game_type'])) {
            // TODO Add errors message
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $title = $_POST["room_title"];
        $description = $_POST["description"] ?? "";
        $maxMembers = intval($_POST["room_number_player"] ?: 5);
        $game = $_POST["room_game"];
        $gamemode = $_POST["room_game_type"];

        $filters = new Filters;
        $gamemodeId = $filters->getGamemodeId($game, $gamemode);

        // Insert the room in DB
        Room::createNewRoom($idUser, $title, $description, $maxMembers, $gamemodeId);

        header("Location: $index");
        exit();
    }

    public function modify()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"] or empty($_POST['room_game_type_id']) or empty($_POST['room_title']))) {
            // TODO Add errors message
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = $_POST["room_id"];
        if (!Room::checkUserOwnership($idUser, $idRoom)) {
            // TODO Add errors message
            header("Location: $index");
            exit();
        }

        $title = $_POST["room_title"];
        $description = $_POST["description"] ?? "";
        $maxMembers = intval($_POST["room_number_player"] ?: 5);
        $gamemodeId = $_POST["room_game_type_id"];

        // Update the room in DB
        Room::modifyRoom($idRoom, $title, $description, $maxMembers, $gamemodeId);

        header("Location: $index");
        exit();
    }

    public function delete()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"])) {
            // TODO Add errors message
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = $_POST["room_id"];
        if (!Room::checkUserOwnership($idUser, $idRoom)) {
            // TODO Add errors message
            header("Location: $index");
            exit();
        }

        // Delete the room in DB
        Room::deleteRoom($idRoom);

        header("Location: $index");
        exit();
    }
    
    public function leave()
    {
        $index = self::URL_INDEX;
        if (empty($_SESSION["user"]) or empty($_POST["room_id"]) or empty($_POST["membersCount"]) or empty($_POST["ownerId"])) {
            // TODO Add errors message
            header("Location: $index");
            exit();
        }

        $idUser = $_SESSION["user"];
        $idRoom = $_POST["room_id"];
        $countMembers = $_POST["membersCount"];
        $idOwner = $_POST["ownerId"];

        // Delete the room in DB
        Room::leaveRoom($idUser, $idRoom, $countMembers, $idOwner);

        header("Location: $index");
        exit();
    }
}

?>
