<?php

namespace App\Models;

use DB;

class Hub
{
    public function __construct(int $connectedUserId = NULL)
    {
        $roomQuery = DB::fetch("SELECT rooms.idRoom, rooms.title, rooms.description, rooms.maxMembers, rooms.dateCreation, games.idGame, games.nameGame, games.tag, gamemodes.idGamemode, gamemodes.nameGamemode
        FROM rooms
            INNER JOIN gamemodes
            ON rooms.idGamemode = gamemodes.idGamemode
                INNER JOIN games
                ON gamemodes.idGame = games.idGame
        WHERE rooms.isEnabled = 1
        ORDER BY rooms.idRoom ASC");

        $this->allRoomsList = [];
        foreach($roomQuery as $room) {
            $roomObj = new Room($room["idRoom"], $room["title"], $room["description"], $room["maxMembers"], $room["dateCreation"], $room["idGame"], $room["nameGame"], $room["tag"], $room["idGamemode"], $room["nameGamemode"]);
            array_push($this->allRoomsList, $roomObj);
        }

        if ($connectedUserId) {
            $this->getFriendRooms($connectedUserId);
            $this->getConnectedUserRoom($connectedUserId);
            $this->getPendingRoomList($connectedUserId);
            if (!empty($this->connectedUserRoom)) {
                if ($connectedUserId === $this->connectedUserRoom->ownerId) {
                    $this->userIsOwner = true;
                    $this->getRequestToJoinUserList($this->connectedUserRoom);
                } else {
                    $this->userIsOwner = false;
                }
                // $this->userIsOwner = ($connectedUserId === $this->connectedUserRoom->ownerId) ? true : false;
            }
        }
    }

    public array $allRoomsList;
    public array $friendRoomsList;
    public array $pendingRoomsIdList = [];
    public array $pendingRoomsList = [];
    public Room $connectedUserRoom;
    public bool $userIsOwner = false;
    public array $usersRequestingToJoin = [];
    
    protected function getFriendRooms(int $userId)
    {
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

    protected function getConnectedUserRoom(int $userId)
    {
        foreach ($this->allRoomsList as $room) {
            foreach ($room->members as $member) {
                if ($member["idUser"] === $userId) {
                    $this->connectedUserRoom = $room;
                }
            }
        }
    }

    protected function getPendingRoomList(int $userId) {
        $allPendingRooms = DB::fetch("SELECT requesttojoin.idRoom
        FROM requesttojoin
        WHERE requesttojoin.idUser = :idUser",
        ["idUser" => $userId]);

        $this->pendingRoomsIdList = [];
        foreach ($allPendingRooms as $room) {
            array_push($this->pendingRoomsIdList, $room["idRoom"]);
        }

        foreach ($this->allRoomsList as $room) {
            if (in_array($room->roomId, $this->pendingRoomsIdList)) {
                array_push($this->pendingRoomsList, $room);
            }
        }
    }

    protected function getRequestToJoinUserList(room $room)
    {
        $this->usersRequestingToJoin = DB::fetch("SELECT users.idUser, users.username, requesttojoin.timeRequest
        FROM requesttojoin
            INNER JOIN users
            ON requesttojoin.idUser = users.idUser
        WHERE requesttojoin.idRoom = :idRoom",
        ["idRoom" => $room->roomId]);
    }
}


?>