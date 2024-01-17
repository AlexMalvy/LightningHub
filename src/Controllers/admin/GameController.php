<?php

namespace App\Controllers\admin;

class GameController
{
    const URL_HANDLER_GAME = '/handlers/game-handler.php';

    public function index()
    {
        require_once base_path('view/admin/game/index.php');
    }

    public function create()
    {
        $game = null;
        //$title = 'Modifier un produit';
        $actionUrl = self::URL_HANDLER_GAME;
        $actionValue = 'store';
        require_once base_path('view/admin/game/game_create.php');
    }
}