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

    public static function updateInsGameUserName(int $id, int $idGame): void
    {
        $inGameUsername = $_POST['inGameUsername'];

        DB::fetch("UPDATE plays SET inGameUsername = :inGameUsername"
        ." WHERE idUser = :id AND idGame = :idGame ;", ['inGameUsername' => $inGameUsername,'id' => $id, 'idGame' => $idGame]);

        header('Location: ' . self::URL_ACCOUNT);
        exit();

    }

    public function getInGameUsername(): array
    {
        return $this->inGameUsername;
    }


}
