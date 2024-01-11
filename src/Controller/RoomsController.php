<?php

namespace App\Controller;

require_once(__DIR__."/../Models/Room.php");

use App\Models\Filters;
use App\Models\Room;

class RoomsController
{
    const URL_CREATE = '/hub.php';
    const URL_INDEX = '/hub.php';
    const URL_HANDLER = '/handlers/product-handler.php';
    
    public function create()
    {
        $index = self::URL_CREATE;
        if (empty($_POST['room_title']) or empty($_POST['room_game_type'])) {
            header("Location: $index");
            exit();
        }

        $idUser = 11;
        $title = $_POST["room_title"];
        $description = $_POST["description"] ?? "";
        $maxMembers = intval($_POST["room_number_player"] ?: 5);
        $game = $_POST["room_game"];
        $gamemode = $_POST["room_game_type"];

        $filters = new Filters;
        $gamemodeId = $filters->getGamemodeId($game, $gamemode);

        // Save the product in DB
        Room::createNewRoom($idUser, $title, $description, $maxMembers, $gamemodeId);

        header("Location: $index");
        exit();
    }
}

?>