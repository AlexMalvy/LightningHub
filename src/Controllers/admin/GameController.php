<?php

namespace App\Controllers\admin;

use App\Models\Games;
use DB;

class GameController
{
    const URL_HANDLER = '/handlers/game-handler.php';
    const URL_INDEX = '/admin/game.php';

    public function index()
    {
        $list_games = (new Games())->allGamesList;
        $games = $this->hydrateGames($list_games);
        $actionUrl = self::URL_HANDLER;

        require_once base_path('view/admin/game/index.php');
    }

    public function create()
    {
        $id = $_GET['id'] ?? null;
        $game = null;
        $title = 'Créer un jeu';
        $actionUrl = self::URL_HANDLER;
        $actionValue = 'store';
        require_once base_path('view/admin/game/game_create.php');
    }

    public function hydrateGames (array $requests){
        foreach ($requests as $key => $request) {
            $requests[$key] = (new \App\Models\Games)->hydrate($request);
        }
        return $requests;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $game = (new Games())->getGameById($id);
        $title = 'Modifier un jeu';
        $actionUrl = self::URL_HANDLER;
        $actionValue = 'update';
        require_once base_path('view/admin/game/game_edit.php');
    }

    public function update()
    {
        $id = $_POST['idGame'] ?? null;
        $game = (new Games)->getGameById($id);
        foreach ($_POST as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($game, $methodName) && $key != 'image') {
                $game->$methodName($value);
            }
        }

        if ($_POST['file']) $game->setImage($_POST['file']);


        $gamesModes = explode(',', $_POST['gamemodes']);
        foreach ($gamesModes as $gamesMode){
            if (trim($gamesMode) != "") {
                DB::insert('gamemodes',[
                    'nameGamemode'  => $gamesMode,
                    'idGame' => $id
                ]);
            }
        }
        $game->setGamesMode($gamesModes);






        // Update the friendship in DB
        $result = $game->save();
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
        } else {
            success('Le produit a bien été modifié.');
        }
    }

    public function delete()
    {
        $idGame = $_POST['idgame'] ?? null;
        $game = (new Games())->getGameById($idGame);


        // Delete a game in DB
        $game->delete();

        redirectAndExit(self::URL_INDEX);
    }

    public function store()
    {
        $idGame = $_POST['idgame'] ?? null;

        $game = new Games();
        foreach ($_POST as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($game, $methodName) && $key != 'image') {
                $game->$methodName($value);
            }
        }

        if ($_POST['file']) $game->setImage($_POST['file']);



        $gamesModes = explode(',', $_POST['gameModes']);
        $game->setGamesMode($gamesModes);
        // Save the product in DB

        DB::insert('games', $game->toArray());
        $connection = DB::getDB();
        $lastId = $connection->lastInsertId();

        foreach ($gamesModes as $gamesMode){
            DB::insert('gamemodes',[
                'nameGamemode'  => $gamesMode,
                'idGame' => $lastId
            ]);
        }
        //$game->save();

        redirectAndExit(self::URL_INDEX);
    }

    public function deleteGameMode()
    {
        $idGameMode = $_POST['idGameMode'] ?? null;

        DB::statement(
            "DELETE FROM gamemodes".
            " WHERE idGamemode = :idGamemode",
            ['idGamemode' => $idGameMode],
        );

        redirectAndExit('../admin/game_edit.php?id='. $_POST['idGame']);
    }


}