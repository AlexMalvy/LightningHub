<?php

namespace App\Controllers;

use DB;


class PlayGamesController extends UserController
{

    const URL_ACCOUNT = '/account.php';

    protected ?array $inGameUsername = [];

    public function __construct(int $id)
    {
        $this->inGameUsername =  DB::fetch("SELECT * FROM plays WHERE idUser = :id;", ['id' => $id]);
    }

    /**
     * Insert InGame username
     */
    public static function insertInGameUserName(int $id, int $idGame): void
    {
        $inGameUsername = $_POST['inGameUsername'];

        DB::fetch("INSERT INTO plays (inGameUsername, idUser, idGame ) VALUES (:inGameUsername, :idUser, :idGame);",
            ['inGameUsername' => $inGameUsername,'idUser' => $id, 'idGame' => $idGame]);

        redirectAndExit(self::URL_ACCOUNT);
    }

    /**
     * Update InGame username
     */
    public static function updateInGameUserName(int $id, int $idGame): void
    {
        $inGameUsername = $_POST['inGameUsername'];

        DB::fetch("UPDATE plays SET inGameUsername = :inGameUsername"
        ." WHERE idUser = :id AND idGame = :idGame ;", ['inGameUsername' => $inGameUsername,'id' => $id, 'idGame' => $idGame]);

        redirectAndExit(self::URL_ACCOUNT);
    }

    /**
     * Get Username to display in view
     */
    public function getInGameUsername(): array
    {
        return $this->inGameUsername;
    }


}
