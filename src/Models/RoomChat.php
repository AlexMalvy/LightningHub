<?php

namespace App\Models;

use DB;

class RoomChat
{
    public function __construct($roomId)
    {
        $messagesDB = DB::fetch("SELECT 
        messages.idMessage, 
        messages.timeMessage, 
        messages.message, 
        messages.isReported,
        messages.idUser, 
        users.username, 
        users.profilePicture
        FROM messages
            INNER JOIN users
            ON messages.idUser = users.idUser
        WHERE messages.idRoom = :idRoom
        ORDER BY messages.timeMessage ASC",
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
}