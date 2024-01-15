<?php

namespace App\Models;

use DB;

class Filters
{
    public function __construct()
    {
        $result = DB::fetch("SELECT games.idGame, games.nameGame, gamemodes.idGamemode, gamemodes.nameGamemode
        FROM games
            INNER JOIN gamemodes
            ON games.idGame = gamemodes.idGame");

        $previous = $result[0]["idGame"];
        $previousName = $result[0]["nameGame"];
        $temp = [];
        foreach ($result as $entry) {
            if ($entry["idGame"] === $previous) {
                // array_push($temp, $entry["nameGamemode"]);
                $temp[$entry["idGamemode"]] = $entry["nameGamemode"];
            } else {
                // Keeps game's id
                $this->filtersList[$previous] = [$previousName => $temp];

                // Discard game's id
                // $this->filtersList[$previousName] = $temp;

                $temp = [$entry["idGamemode"] => $entry["nameGamemode"]];
                $previous = $entry["idGame"];
                $previousName = $entry["nameGame"];
            }
        }
        if ($temp === []) {
            // Keeps game's id
            // $this->filtersList[$previous] = [$previousName => [$entry["nameGamemode"]]];

            // Discard game's id
            $this->filtersList[$previousName] = [$entry["nameGamemode"]];
        } else {
            // Keeps game's id
            $this->filtersList[$previous] = [$previousName => $temp];

            // Discard game's id
            // $this->filtersList[$previousName] = $temp;
        }
    }

    public $filtersList = [];

    public function getGameId($submittedGameName)
    {
        foreach ($this->filtersList as $gameId => $gameInfo) {
            foreach ($gameInfo as $gameName => $gamemodes) {
                if ($submittedGameName == $gameName) {
                    return $gameId;
                }
            }
        }
    }
    
    public function getGamemodeId($submittedGameName, $submittedGamemodeName)
    {
        foreach ($this->filtersList as $gameId => $gameInfo) {
            foreach ($gameInfo as $gameName => $gamemodes) {
                if ($submittedGameName == $gameName) {
                    foreach ($gamemodes as $gamemodeId => $gamemodeName) {
                        if ($submittedGamemodeName == $gamemodeName) {
                            return $gamemodeId;
                        }
                    }
                }
            }
        }
    }

    public function getGamemodesFromGameId($submittedGameId)
    {
        foreach ($this->filtersList as $gameId => $gameInfo) {
            if ($submittedGameId === $gameId) {
                foreach ($gameInfo as $gameName => $gamemodes) {
                    return $gamemodes;
                }
            }
        }
    }
}

?>