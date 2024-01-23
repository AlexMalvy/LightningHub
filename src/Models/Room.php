<?php

namespace App\Models;

use DateTimeImmutable;
use DB;

class Room
{
    public function __construct(
        int $roomId, 
        string $title, 
        string $description, 
        int $maxMembers, $dateDB, 
        int $gameId, 
        string $gameName, 
        string $gameTag, 
        int $gamemodeId, 
        string $gamemode)
    {
        $this->roomId = $roomId;
        $this->title = $title;
        $this->description = $description;
        $this->maxMembers = $maxMembers;
        $this->dateOfCreation = new DateTimeImmutable($dateDB);
        $this->gameId = $gameId;
        $this->gameName = $gameName;
        $this->gameTag = $gameTag;
        
        $this->gamemodeId = $gamemodeId;
        $this->gamemode = $gamemode;

        $this->getRoomMembersConstruct();
    }

    public int $roomId;
    public string $title;
    public string $description;
    public int $maxMembers;
    public DateTimeImmutable $dateOfCreation;

    public int $gameId;
    public string $gameName;
    public string $gameTag;

    public int $gamemodeId;
    public string $gamemode;

    public array $members = [];
    public User|string $owner;
    public int $ownerId;

    public array $friendList = [];

    public RoomChat $chat;

    /**
     * Get room members
     */
    protected function getRoomMembersConstruct()
    {
        $this->members = DB::fetch("SELECT users.username, users.idUser, users.isRoomOwner
        FROM rooms
            INNER JOIN users
            ON rooms.idRoom = users.idRoom
        WHERE users.idRoom = :currentRoom
        ORDER BY users.isRoomOwner DESC", ["currentRoom" => $this->roomId]);

        foreach ($this->members as $member) {
            if ($member["isRoomOwner"] === 1) {
                $this->owner = $member["username"];
                $this->ownerId = $member["idUser"];
            }
        }
    }
    
    /**
     * Get room members and hydrate User object
     */
    public function getConnectedUserRoomMembers()
    {
        $allMembers = DB::fetch("SELECT users.username, users.idUser, users.isRoomOwner, users.profilePicture
        FROM rooms
            INNER JOIN users
            ON rooms.idRoom = users.idRoom
        WHERE users.idRoom = :currentRoom
        ORDER BY users.isRoomOwner DESC", ["currentRoom" => $this->roomId]);

        $this->members = [];
        foreach ($allMembers as $member) {
            $user = User::hydrate($member);
            if ($member["isRoomOwner"] === 1) {
                $this->owner = $user;
                $this->ownerId = $member["idUser"];
            }
            array_push($this->members, $user);
        }
    }

    /**
     * Get this room's chat
     */
    public function getRoomMessages()
    {
        $this->chat = new RoomChat($this->roomId);
    }

    public function getNumberOfFriend(array $allRoomsFriendlist)
    {
        foreach ($allRoomsFriendlist as $friend) {
            if ($friend["idRoom"] === $this->roomId) {
                array_push($this->friendList, $friend);
            }
        }
    }
    
    /**
     * Print minutes since creation of the room 
     */
    public function CreatedSince() : string
    {
        $date_diff = date_diff($this->dateOfCreation, new DateTimeImmutable());
        $hours = intval($date_diff->format('%H'));
        if ($hours !== 0) {
            $minutes_since_creation = "Plus d'une heure";
        } else {
            $minutes = intval($date_diff->format('%i'));
            $minutes_since_creation = 60 - ($minutes);
            $minutes_since_creation = $minutes_since_creation . " min";
        }
        return $minutes_since_creation;
    }
    
    /**
     * Get room members id's
     */
    public static function getRoomMembersId(int $roomId) : array
    {
        $roomMembers = DB::fetch("SELECT users.idUser
        FROM users
        WHERE users.idRoom = :currentRoom", 
        ["currentRoom" => $roomId]);
        return $roomMembers;
    }

    /**
     * Check if target user is the room owner of target room
     */
    public static function checkUserOwnership(int $userId, int $roomId) : bool
    {
        // Get session user info
        $result = \DB::fetch("SELECT users.isRoomOwner, users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $userId]);

        // Check if 
        if (!empty($result)) {
            if ($result[0]["isRoomOwner"] == 1 and $result[0]["idRoom"] == $roomId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Insert into the database a new room and put the requesting user as room owner
     */
    public static function createNewRoom(int $idUser , string $title , string $description, int $maxMembers, int $idGamemode)
    {
        DB::statement("INSERT INTO rooms (title, description, maxMembers, idGamemode)
        VALUES
            (:title, :description, :maxMembers, :idGamemode);", 
            ["title" => $title, "description" => $description, "maxMembers" => $maxMembers, "idGamemode" => $idGamemode]);

        $connection = DB::getDB();

        DB::statement("UPDATE Users
        SET idRoom = :idRoom, isRoomOwner = 1
        WHERE idUser = :idUser;", 
        ["idRoom" => $connection->lastInsertId(), "idUser" => $idUser]);
        
        self::cancelAllRequestToJoinRooms($idUser);
    }

    /**
     * Modify the target room
     */
    public static function modifyRoom(int $idRoom , string $title , string $description, int $maxMembers, int $idGamemode)
    {
        DB::statement("UPDATE rooms
        SET title = :title, description = :description, maxMembers = :maxMembers, idGamemode = :idGamemode
        WHERE rooms.idRoom = :idRoom",
        ["idRoom" => $idRoom, "title" => $title, "description" => $description, "maxMembers" => $maxMembers, "idGamemode" => $idGamemode]);
    }

    /**
     * Delete target room, kick all room members from it and cancel all request to join
     */
    public static function deleteRoom(int $idRoom)
    {
        $roomMembers = self::getRoomMembersId($idRoom);

        // Remove each user's room and ownership
        foreach ($roomMembers as $member) {
            DB::statement("UPDATE users
            SET users.isRoomOwner = 0, users.idRoom = NULL
            WHERE users.idUser = :idUser",
            ["idUser" => $member["idUser"]]);
        }

        // Delete requestToJoin the room from db
        DB::statement("DELETE FROM requesttojoin
        WHERE requesttojoin.idRoom = :idRoom",
        ["idRoom" => $idRoom]);

        // Delete the room from db
        DB::statement("UPDATE rooms
        SET rooms.isEnabled = 0
        WHERE rooms.idRoom = :idRoom",
        ["idRoom" => $idRoom]);
    }

    /**
     * Make connected user leave his room, transfer ownership (last room member) 
     * or delete room (atleast another member still in the room) if needed
     */
    public static function leaveRoom(int $idUser, int $idRoom)
    {
        $isOwner = self::checkUserOwnership($idUser, $idRoom);
        if ($isOwner) {
            // Retrieve all room members
            $allMembers = self::getRoomMembersId($idRoom);

            // Delete room if user is last room member
            if (count($allMembers) === 1) {
                self::deleteRoom($idRoom);
                return true;
            }

            // Determine the new room owner (get his id)
            $newOwnerId = $idUser;
            foreach ($allMembers as $member) {
                if ($member["idUser"] != $idUser) {
                    $newOwnerId = $member["idUser"];
                    break;
                }
            }

            // Appoint the new room owner
            DB::statement("UPDATE users
            SET users.isRoomOwner = 1
            WHERE users.idUser = :idUser",
            ["idUser" => $newOwnerId]);
        }
        
        // Remove initial user from his room
        DB::statement("UPDATE Users
        SET users.isRoomOwner = 0, users.idRoom = NULL
        WHERE idUser = :idUser", ["idUser" => $idUser]);
    }
    
    /**
     * Promote target user to room owner if connected user is room owner 
     * and both users are in the same room
     */
    public static function promoteToOwner(int $idUser, int $idTarget)
    {
        // Retrieve from DB room owner and soon-to-be room owner
        $result = DB::fetch('SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE idUser = :idUser1 OR idUser = :idUser2',
        ["idUser1" => $idUser, "idUser2" => $idTarget]);

        if (count($result) === 2) {
            // Checks if user is the room owner
            if (($result[0]["isRoomOwner"] and $result[0]["idUser"] == $idUser) 
            or ($result[1]["isRoomOwner"] and $result[1]["idUser"] == $idUser)) {
                // Checks that both users are in the same room
                if ($result[0]["idRoom"] === $result[1]["idRoom"]) {
                    DB::statement("UPDATE users
                    SET users.isRoomOwner = 0
                    WHERE users.idUser = :idUser",
                    ["idUser" => $idUser]);

                    DB::statement("UPDATE users
                    SET users.isRoomOwner = 1
                    WHERE users.idUser = :idTarget",
                    ["idTarget" => $idTarget]);
                }
            }
        }
    }
    
    /**
     * Kick target user from connected user's room if connected user is room owner
     */
    public static function kickFromRoom(int $idUser, int $idTarget)
    {
        // Retrieve from DB room owner and soon-to-be room owner
        $result = DB::fetch('SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE idUser = :idUser1 OR idUser = :idUser2',
        ["idUser1" => $idUser, "idUser2" => $idTarget]);

        if (count($result) === 2) {
            // Checks if user is the room owner
            if (($result[0]["isRoomOwner"] and $result[0]["idUser"] == $idUser) 
            or ($result[1]["isRoomOwner"] and $result[1]["idUser"] == $idUser)) {
                // Checks that both users are in the same room
                if ($result[0]["idRoom"] === $result[1]["idRoom"]) {
                    DB::statement("UPDATE users
                    SET users.idRoom = NULL
                    WHERE users.idUser = :idTarget",
                    ["idTarget" => $idTarget]);
                }
            }
        }
    }

    /**
     * Put a request to join target room for the connected user
     */
    public static function RequestToJoinRoom(int $idUser, int $idRoom)
    {
        $result = DB::fetch("SELECT rooms.idRoom
        FROM rooms
        WHERE idRoom = :idRoom",
        ["idRoom" => $idRoom]);

        if (count($result) === 1) {
            DB::statement("INSERT INTO requesttojoin 
            (idUser, idRoom)
            VALUES (:idUser, :idRoom)",
            ["idUser" => $idUser, "idRoom" => $idRoom]);
        }
    }

    /**
     * Cancel a request to join target room for the connected user
     */
    public static function cancelRequestToJoinRoom(int $idUser, int $idRoom)
    {
        $result = DB::fetch("SELECT requesttojoin.idUser
        FROM requesttojoin
        WHERE requesttojoin.idUser = :idUser AND requesttojoin.idRoom = :idRoom",
        ["idUser" => $idUser, "idRoom" => $idRoom]);

        if (count($result) === 1) {
            DB::statement("DELETE FROM requesttojoin
            WHERE requesttojoin.idUser = :idUser AND requesttojoin.idRoom = :idRoom",
            ["idUser" => $idUser, "idRoom" => $idRoom]);
        }
    }

    /**
     * Cancel all request to join rooms for the target user
     */
    public static function cancelAllRequestToJoinRooms(int $idUser)
    {
        DB::statement("DELETE FROM requesttojoin
        WHERE requesttojoin.idUser = :idUser",
        ["idUser" => $idUser]);
    }
    
    /**
     * Accept targeted user into targeted room if connected user is the room owner of the targeted room
     */
    public static function acceptIntoRoom(int $idUser, int $idTarget, int $idRoom)
    {
        // Retrieve from DB room owner and target user
        $usersResults = DB::fetch('SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE idUser = :idUser1 OR idUser = :idUser2',
        ["idUser1" => $idUser, "idUser2" => $idTarget]);


        if (count($usersResults) === 2) {
            // Checks if user is the room owner and confirm room Id
            if (($usersResults[0]["isRoomOwner"] and $usersResults[0]["idUser"] == $idUser and $usersResults[0]["idRoom"] == $idRoom) 
            or ($usersResults[1]["isRoomOwner"] and $usersResults[1]["idUser"] == $idUser and $usersResults[1]["idRoom"] == $idRoom)) {
                // Good result
            } else {
                // TODO error message ?
                return;
            }
        } else {
            // TODO error message ?
            return;
        }
        
        // Get the number of user and max users of the room 
        $roomResults = DB::fetch("SELECT COUNT(*) 'numberOfUsers', rooms.maxMembers
        FROM users
            INNER JOIN rooms
            ON users.idRoom = rooms.idRoom
        WHERE users.idRoom = :idRoom",
        ["idRoom" => $idRoom]);

        // Accept the user if room still has space
        if ($roomResults[0]["numberOfUsers"] < $roomResults[0]["maxMembers"]) {
            DB::statement("UPDATE users
            SET users.idRoom = :idRoom
            WHERE users.idUser = :idTarget",
            ["idRoom" => $idRoom, "idTarget" => $idTarget]);
            self::cancelAllRequestToJoinRooms($idTarget);
        } else {
            // TODO error message ? max number of participant in room
            return;
        }

    }
    
    /**
     * Accept targeted user into targeted room if connected user is the room owner of the targeted room 
     * and the room still has place
     */
    public static function declineIntoRoom(int $idUser, int $idTarget, int $idRoom)
    {
        // Retrieve from DB room owner and target user
        $usersResults = DB::fetch('SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE idUser = :idUser1 OR idUser = :idUser2',
        ["idUser1" => $idUser, "idUser2" => $idTarget]);


        if (count($usersResults) === 2) {
            // Checks if user is the room owner and confirm room Id
            if (($usersResults[0]["isRoomOwner"] and $usersResults[0]["idUser"] == $idUser and $usersResults[0]["idRoom"] == $idRoom) 
            or ($usersResults[1]["isRoomOwner"] and $usersResults[1]["idUser"] == $idUser and $usersResults[1]["idRoom"] == $idRoom)) {
                // Good result
            } else {
                // TODO error message ?
                return;
            }
        } else {
            // TODO error message ?
            return;
        }

        // Accept the user if room still has space
        DB::statement("DELETE FROM requesttojoin
        WHERE requesttojoin.idRoom = :idRoom AND requesttojoin.idUser = :idTarget",
        ["idRoom" => $idRoom, "idTarget" => $idTarget]);

    }
}


?>