<?php

namespace App\Models;

use DB;

class Games
{

    public $allGamesList = [];

    public function __construct()
    {
        $this->allGamesList = DB::fetch("SELECT * FROM games");
    }

    public function getOnlyXGames(int $amount) : array
    {
        return array_slice($this->allGamesList, 0, $amount);
    }
}