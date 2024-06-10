<?php

namespace App\Models;

use DB;

class Hub
{
    public function __construct(int $connectedUserId = NULL, string $gameName = NULL, string $gamemodeName = NULL, string $search = NULL)
    {
        $filtersString = "";
        if (!empty($gameName)) {
            $filtersString .= " AND Games.nameGame = '" . strip_tags($gameName)."'";
        }
        if (!empty($gamemodeName)) {
            $filtersString .= " AND Gamemodes.nameGamemode = '" . strip_tags($gamemodeName)."'";
        }
        if (!empty($search)) {
            $filtersString .= " AND (Rooms.title LIKE '%" . strip_tags($search)."%' OR Rooms.description LIKE '%".$search."%')";
        }
        
        $preparedQuery = "SELECT 
        Rooms.idRoom, 
        Rooms.title, 
        Rooms.description, 
        Rooms.maxMembers, 
        Rooms.dateCreation, 
        Games.idGame, 
        Games.nameGame, 
        Games.tag, 
        Gamemodes.idGamemode, 
        Gamemodes.nameGamemode
        FROM Rooms
            INNER JOIN Gamemodes
            ON Rooms.idGamemode = Gamemodes.idGamemode
                INNER JOIN Games
                ON Gamemodes.idGame = Games.idGame
        WHERE Rooms.isEnabled = 1 ".$filtersString
        ." ORDER BY Rooms.idRoom ASC";

        $roomQuery = DB::fetch($preparedQuery);

        $this->allRoomsList = [];
        foreach($roomQuery as $room) {
            $roomObj = new Room(
                $room["idRoom"], 
                $room["title"], 
                $room["description"], 
                $room["maxMembers"], 
                $room["dateCreation"], 
                $room["idGame"], 
                $room["nameGame"], 
                $room["tag"], 
                $room["idGamemode"], 
                $room["nameGamemode"]);
            array_push($this->allRoomsList, $roomObj);
        }

        if ($connectedUserId) {
            $this->getFriendRooms($connectedUserId);
            $this->connectedUserRoom = $this->getConnectedUserRoom($connectedUserId);
            $this->getPendingRoomList($connectedUserId);
            if (!empty($this->connectedUserRoom)) {
                if ($connectedUserId === $this->connectedUserRoom->ownerId) {
                    $this->userIsOwner = true;
                    $this->getRequestToJoinUserList($this->connectedUserRoom);
                } else {
                    $this->userIsOwner = false;
                }
                $this->connectedUserRoom->getConnectedUserRoomMembers();
                $this->connectedUserRoom->getRoomMessages();
            }
        }
    }

    public array $allRoomsList;
    public array $friendRoomsList;
    public array $pendingRoomsIdList = [];
    public array $pendingRoomsList = [];
    public Room|NULL $connectedUserRoom;
    public bool $userIsOwner = false;
    public array $usersRequestingToJoin = [];
    
    /**
     * Get connected user's friends
     */
    protected function getFriendRooms(int $userId)
    {
        $result = DB::fetch("SELECT isFriend.idUser1, isFriend.idUser2
        FROM isFriend
        WHERE isFriend.accepted = 1 AND (isFriend.idUser1 = :connectedUserId OR isFriend.idUser2 = :connectedUserId)", 
        ["connectedUserId" => $userId]);

        $tempFriendList = [];
        foreach ($result as $line) {
            if ($line["idUser1"] === $userId) {
                array_push($tempFriendList, $line["idUser2"]);
            } else {
                array_push($tempFriendList, $line["idUser1"]);
            }
        }

        $tempFriendList = "'".implode("', '", $tempFriendList)."'";

        $this->friendRoomsList = DB::fetch("SELECT Users.idUser, Users.username, Users.idRoom
        FROM Users
        WHERE Users.idUser IN (".$tempFriendList.")");
    }

    /**
     * Get connected user's room
     */
    protected function getConnectedUserRoom(int $userId) : Room|NULL
    {
        $result = DB::fetch("SELECT Users.idRoom
        FROM Users
        WHERE Users.idUser = :idUser",
        ["idUser" => $userId]);

        if (!empty($result)) {
            if ($result[0]["idRoom"] != NULL) {
                $roomQuery = DB::fetch("SELECT 
                Rooms.idRoom, 
                Rooms.title, 
                Rooms.description, 
                Rooms.maxMembers, 
                Rooms.dateCreation, 
                Games.idGame, 
                Games.nameGame, 
                Games.tag, 
                Gamemodes.idGamemode, 
                Gamemodes.nameGamemode
                FROM Rooms
                    INNER JOIN Gamemodes
                    ON Rooms.idGamemode = Gamemodes.idGamemode
                        INNER JOIN Games
                        ON Gamemodes.idGame = Games.idGame
                WHERE Rooms.isEnabled = 1 AND Rooms.idRoom = :idRoom
                ORDER BY Rooms.idRoom ASC",
                ["idRoom" => $result[0]["idRoom"]]);

                $room = $roomQuery[0];
                
                $roomObj = new Room(
                    $room["idRoom"], 
                    $room["title"], 
                    $room["description"], 
                    $room["maxMembers"], 
                    $room["dateCreation"], 
                    $room["idGame"], 
                    $room["nameGame"], 
                    $room["tag"], 
                    $room["idGamemode"], 
                    $room["nameGamemode"]);

                return $roomObj;
            }
        }
        return NULL;
        
    }

    /**
     * Get current user's list of requested to join rooms
     */
    protected function getPendingRoomList(int $userId) {
        $allPendingRooms = DB::fetch("SELECT requestToJoin.idRoom
        FROM requestToJoin
        WHERE requestToJoin.idUser = :idUser",
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

    /**
     * Get target room requesting to join users
     */
    protected function getRequestToJoinUserList(room $room)
    {
        $this->usersRequestingToJoin = DB::fetch("SELECT Users.idUser, Users.username, requestToJoin.timeRequest
        FROM requestToJoin
            INNER JOIN Users
            ON requestToJoin.idUser = Users.idUser
        WHERE requestToJoin.idRoom = :idRoom",
        ["idRoom" => $room->roomId]);
    }
    
    /**
     * Get current owner room's list of requesting to join user through Ajax
     */
    public static function requestToJoinRoomAjax(int $idUser)
    {
        $getRoomId = DB::fetch("SELECT Users.idRoom, Users.isRoomOwner
        FROM Users
        WHERE Users.idUser = :idUser",
        ["idUser" => $idUser]);

        if ($getRoomId[0]["idRoom"] != NULL and $getRoomId[0]["isRoomOwner"]) {
            $result = DB::fetch("SELECT Users.idUser, Users.username, requestToJoin.timeRequest, requestToJoin.idRoom
            FROM requestToJoin
                INNER JOIN Users
                ON requestToJoin.idUser = Users.idUser
            WHERE requestToJoin.idRoom = :idRoom",
            ["idRoom" => $getRoomId[0]["idRoom"]]);

            print(json_encode(["requests" => $result]));
        }
        exit();
    }
    
    /**
     * Get if current user's got accepted into a room through ajax request
     */
    public static function joinedRoomAjax(int $idUser)
    {
        $result = DB::fetch("SELECT Users.idRoom, Rooms.title
        FROM Users
            INNER JOIN Rooms
            ON Users.idRoom = Rooms.idRoom
        WHERE Users.idUser = :idUser",
        ["idUser" => $idUser]);

        print(json_encode(["joined" => $result]));
        exit();
    }
}


?>