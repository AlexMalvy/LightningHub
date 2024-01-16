<?php

namespace App\Controllers;

use App\Models\User;
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
     * Update InGame username
     */
    public static function updateInsGameUserName(int $id, int $idGame): void
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
