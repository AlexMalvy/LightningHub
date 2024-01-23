<?php

namespace App\Models;

use Auth;
use DateTime;
use DB;

class Social
{
    const TABLE_NAME = 'isfriend';
    protected ?int $idUser1;
    protected ?int $idUser2;
    protected ?int $accepted;

    public function __construct(
        ?int $idUser1,
        ?int $idUser2,
        ?int $accepted
    ) {
        $this->idUser1 = $idUser1;
        $this->idUser2 = $idUser2;
        $this->accepted = $accepted;
    }

    /**
     * @param array $data
     * @return Social
     * hydration of a Social object (= friendship)
     */
    public static function hydrate(array $data): Social
    {
        $social = new Social(
            $data['idUser1'] ?? null,
            $data['idUser2'] ?? null,
            $data['accepted'] ?? null,
        );

        $social->idUser1 = $data['idUser1'] ?? null;
        $social->idUser2 = $data['idUser2'] ?? null;
        $social->accepted = $data['accepted'] ?? null;

        return $social;
    }

    public function delete() : int
    {
        if ($this->idUser1 == Auth::getSessionUserId() ) return self::staticDelete($this->idUser2);
        else return self::staticDelete($this->idUser1);
    }

    /**
     * delete a friendship (Social)
     * @param int $idFriend
     * @return int
     */
    public static function staticDelete(int $idFriend) : int
    {
        $myId = Auth::getSessionUserId();
        return DB::statement(
            "DELETE FROM isfriend".
            " WHERE idUser1 = :idUser1 AND idUser2 = :idUser2".
            " OR idUser1 = :idUser2 AND idUser2 = :idUser1",
            ['idUser1' => $myId,
                'idUser2' => $idFriend],
        );
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

    public function getAccepted(): ?int
    {
        return $this->accepted;
    }

    public function setAccepted(?int $accepted): void
    {
        $this->accepted = $accepted;
    }

    public function save($forced = false) : int
    {

        if ($this->idUser2 ?? null) {
            // Update
            $table = self::TABLE_NAME;

            return DB::statement(
                "UPDATE $table SET accepted = 1"
                ." WHERE idUser1 = :id and idUser2 = :idUser"
                ." OR idUser2 = :id and idUser1 = :idUser"
                ,
                // Params
                [':id' => $this->idUser2,
                    'idUser' => $this->idUser1],
            );



        }

        return 0;
    }


    public function insert(): bool
    {
        $data =  [
            'idUser1' => $this->idUser1,
            'idUser2' => $this->idUser2,
            'accepted' => $this->accepted,
        ];
        return DB::insert(self::TABLE_NAME, $data);
    }





}