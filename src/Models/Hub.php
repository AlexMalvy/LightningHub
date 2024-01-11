<?php

namespace App\Models;

use DB;

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
    public array $friendRoomsList;
    public array $pendingRoomsList;
    
    public function getFriendRooms($userId) {
        $result = DB::fetch("SELECT isfriend.idUser1, isfriend.idUser2
        FROM isfriend
        WHERE isfriend.accepted = 1 AND (isfriend.idUser1 = :connectedUserId OR isfriend.idUser2 = :connectedUserId)", ["connectedUserId" => $userId]);

        $tempFriendList = [];
        foreach ($result as $line) {
            if ($line["idUser1"] === $userId) {
                array_push($tempFriendList, $line["idUser2"]);
            } else {
                array_push($tempFriendList, $line["idUser1"]);
            }
        }

        $tempFriendList = "'".implode("', '", $tempFriendList)."'";

        $this->friendRoomsList = DB::fetch("SELECT users.idUser, users.username, users.idRoom
        FROM users
        WHERE users.idUser IN (".$tempFriendList.")");
    }
}


?>