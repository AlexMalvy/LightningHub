<?php

namespace App\Models;

use DateTimeImmutable;
use DB;

class Room
{
    public function __construct(int $roomId, string $title, string $description, int $maxMembers, $dateDB, string $gameTag, string $gamemode)
    {
        $this->roomId = $roomId;
        $this->title = $title;
        $this->description = $description;
        $this->maxMembers = $maxMembers;
        $this->dateOfCreation = new DateTimeImmutable($dateDB);
        $this->gameTag = $gameTag;
        $this->gamemode = $gamemode;

        $this->getRoomMembers();
    }

    public int $roomId;
    public string $title;
    public string $description;
    public int $maxMembers;
    public DateTimeImmutable $dateOfCreation;

    public string $gameTag;
    public string $gamemode;

    public array $members;
    public string $owner;
    public int $OwnerId;

    public array $friendList = [];

    // Construct Get Room Members
    protected function getRoomMembers()
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
                $this->OwnerId = $member["idUser"];
            }
        }
    }

    public function getNumberOfFriend($allRoomsFriendlist) {
        foreach ($allRoomsFriendlist as $friend) {
            if ($friend["idRoom"] === $this->roomId) {
                array_push($this->friendList, $friend);
            }
        }
    }
    
    // Display Room creation time
    public function CreatedSince()
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

    public static function createNewRoom(int $idUser , string $title , string $description, int $maxMembers, int $idGamemode,)
    {
        DB::statement("
        INSERT INTO rooms (title, description, maxMembers, idGamemode)
        VALUES
            (:title, :description, :maxMembers, :idGamemode);", ["title" => $title, "description" => $description, "maxMembers" => $maxMembers, "idGamemode" => $idGamemode]);

        $connection = DB::getDB();

        DB::statement("UPDATE Users
        SET idRoom = :idRoom, isRoomOwner = 1
        WHERE idUser = :idUser;", ["idRoom" => $connection->lastInsertId(), "idUser" => $idUser]);
    }

}


?>