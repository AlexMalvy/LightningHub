<?php

namespace Models;

require("Room.php");

use DB;
use Models\Room;

class Hub
{
    public function __construct()
    {
        $roomQuery = DB::fetch("SELECT rooms.idRoom, rooms.title, rooms.description, rooms.maxMembers, rooms.dateCreation, games.tag, gamemodes.nameGamemode
        FROM rooms
            INNER JOIN gamemodes
            ON rooms.idGamemode = gamemodes.idGamemode
                INNER JOIN games
                ON gamemodes.idGame = games.idGame
        ORDER BY rooms.idRoom ASC");

        $this->allRoomsList = [];
        foreach($roomQuery as $room) {
            $roomObj = new Room($room["idRoom"], $room["title"], $room["description"], $room["maxMembers"], $room["dateCreation"], $room["tag"], $room["nameGamemode"]);
            array_push($this->allRoomsList, $roomObj);
        }
    }

    public array $allRoomsList;
}


?>