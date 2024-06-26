<?php

namespace App\Models;

use DB;

class RoomChat
{
    public function __construct($roomId)
    {
        $messagesDB = DB::fetch("SELECT 
        Messages.idMessage, 
        Messages.timeMessage, 
        Messages.message, 
        Messages.isReported,
        Messages.idUser, 
        users.username, 
        users.profilePicture
        FROM Messages
            INNER JOIN users
            ON Messages.idUser = users.idUser
        WHERE Messages.idRoom = :idRoom
        ORDER BY Messages.timeMessage ASC",
        ["idRoom" => $roomId]);

        foreach ($messagesDB as $message) {
            array_push($this->allMessages, new RoomMessage(
                $message["idMessage"], 
                $message["timeMessage"], 
                $message["message"], 
                $message["isReported"], 
                $message["idUser"], 
                $message["username"], 
                $message["profilePicture"]));
        }
    }

    public array $allMessages = [];
    
    /**
     * Retrieve all the information needed to create a new RoomChat for an Ajax request
     */
    public static function messagesAjax(int $idUser)
    {
        $getRoomId = DB::fetch("SELECT users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $idUser]);

        $result = DB::fetch("SELECT 
        Messages.idMessage, 
        Messages.timeMessage, 
        Messages.message, 
        Messages.isReported,
        Messages.idUser, 
        users.username, 
        users.profilePicture
        FROM Messages
            INNER JOIN users
            ON Messages.idUser = users.idUser
        WHERE Messages.idRoom = :idRoom
        ORDER BY Messages.timeMessage ASC",
        ["idRoom" => $getRoomId[0]["idRoom"]]);

        print(json_encode(["roomChat" => $result]));
        exit();
    }
}