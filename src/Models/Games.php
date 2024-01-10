<?php

namespace App\Models;

use DB;

class Games
{
    public function __construct()
    {
        $this->allGamesList = DB::fetch("SELECT * FROM games");
    }

    public $allGamesList = [];

    public function getOnlyXGames(int $amount) : array
    {
        return array_slice($this->allGamesList, 0, $amount);
    }
}