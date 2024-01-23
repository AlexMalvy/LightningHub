<?php

namespace App\Models;

use DateTime;
use DB;

class PrivateMessage
{
    const TABLE_NAME = 'sendPrivateMessages';
    protected ?int $idUser1;
    protected ?int $idUser2;
    protected ?string $timeMessage;
    protected ?string $message;
    protected ?int $isReported;


    public function __construct(
        ?int $idUser1,
        ?int $idUser2,
        ?string $message,
        ?int $isReported,
        string|DateTime|null $timeMessage = null //
    ) {
        $this->idUser1 = $idUser1;
        $this->idUser2 = $idUser2;
        $this->timeMessage = $timeMessage;
        $this->message = $message;
        $this->isReported = $isReported; // prepareCreatedAt($created_at);

    }

    /**
     * @param array $data
     * @return PrivateMessage
     * hydrate the message
     */
    public static function hydrate(array $data): PrivateMessage
    {

        $msg = new PrivateMessage(
            $data['idUser1'] ?? null,
            $data['idUser2'] ?? null,
            $data['message'] ?? null,
            $data['isReported'] ?? null,
            $data['timeMessage'] ?? null
        );

        return $msg;
    }

    public function getIdUser1(): ?int
    {
        return $this->idUser1;
    }

    public function setIdUser1(?int $idUser1): void
    {
        $this->idUser1 = $idUser1;
    }

    public function getIdUser2(): ?int
    {
        return $this->idUser2;
    }

    public function setIdUser2(?int $idUser2): void
    {
        $this->idUser2 = $idUser2;
    }

    public function getTimeMessage(): ?string
    {
        return $this->timeMessage;
    }

    public function setTimeMessage(?string $timeMessage): void
    {
        $this->timeMessage = $timeMessage;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function getIsReported(): ?int
    {
        return $this->isReported;
    }

    public function setIsReported(?int $isReported): void
    {
        $this->isReported = $isReported;
    }

    public function save() : int|false
    {
        $table = self::TABLE_NAME;

        return DB::statement(
            "UPDATE $table SET isReported = :isReported"
            ." WHERE timeMessage = :timeMessage"
            ." AND (idUser1 = :idUser1 and idUser2 = :idUser2"
            ." or idUser1 = :idUser2 and idUser2 = :idUser1)"
            ,
            // Params
            ['idUser1' => $this->idUser2,
             'idUser2' => $this->idUser1,
             'timeMessage' => $this->timeMessage,
             'isReported' => $this->isReported],
        );


    }

}