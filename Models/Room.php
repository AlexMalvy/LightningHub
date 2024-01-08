<?php

namespace Models;

use DateTimeImmutable;
use DB;

class Room
{
    public function __construct($roomId, $title, $description, $maxMembers, $dateDB, $gameTag, $gamemode)
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

    public $friendList;

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

    public function getNumberOfFriend($userId) {
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

        $this->friendList = DB::fetch("SELECT users.idUser, users.username
        FROM users
        WHERE users.idUser IN (".$tempFriendList.")");
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

}


?>