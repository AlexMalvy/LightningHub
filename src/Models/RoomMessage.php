<?php

namespace App\Models;

use DB;

class RoomMessage
{
    public function __construct(
        int $idMessage, 
        string $timeMessage, 
        string $message, 
        bool $isReported, 
        int $idUser, 
        string $username, 
        string $profilePicture)
    {
        $this->idMessage = $idMessage;
        $this->timeMessage = new \DateTimeImmutable($timeMessage);
        $this->message = $message;
        $this->isReported = $isReported;
        $this->user = User::hydrate(["idUser" => $idUser, "username" => $username, "profilePicture" => $profilePicture]);
    }

    public int $idMessage;
    public \DateTimeImmutable $timeMessage;
    public string $message;
    public int $isReported;
    public User $user;

    /**
     * Send a message into the connected user's room
     */
    public static function sendMessage(int $idUser, string $message)
    {
        $resultUserRoomCheck = DB::fetch("SELECT users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $idUser]);

        DB::statement("INSERT INTO messages (message, idRoom, idUser)
        VALUES (:message, :idRoom, :idUser)",
        ["message" => $message, "idRoom" => $resultUserRoomCheck[0]["idRoom"], "idUser" => $idUser]);
    }

    /**
     * Report the target message in the connected user's room
     */
    public static function reportMessage(int $idUser, int $idMessage)
    {
        $resultUserRoomCheck = DB::fetch("SELECT users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $idUser]);

        $resultMessageRoomCheck = DB::fetch("SELECT messages.idRoom
        FROM messages
        WHERE messages.idMessage = :idMessage",
        ["idMessage" => $idMessage]);

        if ($resultUserRoomCheck[0]["idRoom"] !== $resultMessageRoomCheck[0]["idRoom"]) {
            // TODO error message
            return;
        }

        DB::statement("UPDATE messages
        SET messages.isReported = 1
        WHERE messages.idMessage = :idMessage",
        ["idMessage" => $idMessage]);
    }
}