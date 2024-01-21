<?php

namespace App\Models;

use DB;

class Games
{
    const TABLE_NAME = 'games';
    public int $idGame;
    public string $nameGame;
    public string $tag;
    public string $descriptionShort;
    public string $description;
    public string $twitch;
    public string $reddit;
    public string $officialWebsite;
    public string $image;

    public $allGamesList = [];

    public array $gamesMode = [];

    public function __construct()
    {
        $this->allGamesList = DB::fetch("SELECT * FROM games");
    }

    public function getOnlyXGames(int $amount) : array
    {
        return array_slice($this->allGamesList, 0, $amount);
    }

    public function hydrate(array $data): Games {

        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }

        return $this;
    }

    // Fonction pour récupérer un objet Game par son ID
    public function getGameById(int $id): ?Games {
        foreach ($this->allGamesList as $game) {
            if ($game['idGame'] === $id) {
                return (new Games)->hydrate($game);
            }
        }
        return null; // Retourne null si aucun objet n'est trouvé avec l'ID spécifié
    }

    public function save()
    {
        if ($this->idGame ?? null) {
            // Update
            return DB::statement(
                "UPDATE Games SET".
                " nameGame = :nameGame,".
                " tag = :tag,".
                " descriptionShort = :descriptionShort,".
                " description = :description,".
                " twitch = :twitch,".
                " reddit = :reddit,".
                " officialWebsite = :officialWebsite,".
                " image = :image".
                " WHERE idGame = :idGame"
                ,
                // Params
                [':idGame' => $this->idGame,
                    ':nameGame' => $this->nameGame,
                    ':tag' => $this->tag,
                    ':descriptionShort' => $this->descriptionShort,
                    ':description' => $this->description,
                    ':twitch' => $this->twitch,
                    ':reddit' => $this->reddit,
                    ':officialWebsite' => $this->officialWebsite,
                    ':image' => $this->image,
                    ],
            );



        } else {
            // Insert
            // return DB::insert(self::TABLE_NAME, $this->toArray());
        }

        return 0;
    }

    public function delete(): bool|int
    {
        DB::statement(
            "DELETE FROM gamemodes".
            " WHERE idGame = :idGame",
            ['idGame' => $this->idGame],
        );

        return DB::statement(
            "DELETE FROM games".
            " WHERE idGame = :idGame",
            ['idGame' => $this->idGame],
        );
    }

    public function getAllGamesModes() {
        $gamesModes = DB::fetch("SELECT * FROM gamemodes WHERE idGame = $this->idGame");
        $res = [];
        foreach ($gamesModes as $gameMode) {
            $res[] = $gameMode;
        }
        return $res;
    }


    // Getters
    public function getIdGame(): int {
        return $this->idGame;
    }

    public function getNameGame(): string {
        return $this->nameGame;
    }

    public function getTag(): string {
        return $this->tag;
    }

    public function getDescriptionShort(): string {
        return $this->descriptionShort;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getTwitch(): string {
        return $this->twitch;
    }

    public function getReddit(): string {
        return $this->reddit;
    }

    public function getOfficialWebsite(): string {
        return $this->officialWebsite;
    }

    public function getImage(): string {
        return $this->image;
    }

    // Setters
    public function setIdGame(int $idGame): void {
        $this->idGame = $idGame;
    }

    public function setNameGame(string $nameGame): void {
        $this->nameGame = $nameGame;
    }

    public function setTag(string $tag): void {
        $this->tag = $tag;
    }

    public function setDescriptionShort(string $descriptionShort): void {
        $this->descriptionShort = $descriptionShort;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setTwitch(string $twitch): void {
        $this->twitch = $twitch;
    }

    public function setReddit(string $reddit): void {
        $this->reddit = $reddit;
    }

    public function setOfficialWebsite(string $officialWebsite): void {
        $this->officialWebsite = $officialWebsite;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    public function getGamesMode(): array
    {
        return $this->gamesMode;
    }

    public function setGamesMode(array $gamesMode): void
    {
        $this->gamesMode = $gamesMode;
    }

    public function toArray()
    {
        return [
            'idGame' => $this->idGame ?? null,
            'nameGame' => $this->nameGame,
            'tag' => $this->tag,
            'descriptionShort' => $this->descriptionShort,
            'description' => $this->description,
            'twitch' => $this->twitch,
            'reddit' => $this->reddit,
            'officialWebsite' => $this->officialWebsite,
            'image' => $this->image,
        ];
    }


}