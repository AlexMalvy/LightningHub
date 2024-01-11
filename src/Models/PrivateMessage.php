<?php

namespace App\Models;


use DateTime;
use DB;

class PrivateMessage
{
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




}