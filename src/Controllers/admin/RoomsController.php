<?php

namespace App\Controllers\admin;

use App\Models\Hub;
use App\Models\Room;
use DB;

class RoomsController
{
    const URL_HANDLER = '/handlers/room-handler.php';
    const URL_INDEX = '/admin/hub.php';

    public function index()
    {
        AdminController::isAdmin();
        $hubs = (new Hub())->allRoomsList;

        $actionUrl = self::URL_HANDLER;

        require_once base_path('view/admin/hub/index.php');
    }

    public function create()
    {
        AdminController::isAdmin();
        $hub = null;
        //$title = 'Modifier un produit';
        $actionUrl = self::URL_HANDLER;
        $actionValue = 'store';
        require_once base_path('view/admin/hub/hub_create.php');
    }

    public function edit()
    {
        AdminController::isAdmin();
        $id = $_GET['id'] ?? null;
        $hub = $this->getRoomById($id);
        $title = 'Modifier un salon';
        $actionUrl = self::URL_HANDLER;
        $actionValue = 'update';
        require_once base_path('view/admin/hub/hub_edit.php');
    }

    protected function getRoomById(?int $id): Room
    {
        if (!$id) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        $room = DB::fetch(
            "SELECT * FROM rooms".
            " INNER JOIN gamemodes ON rooms.idGamemode = gamemodes.idGamemode".
            " INNER JOIN games ON games.idGame = gamemodes.idGame".
            " WHERE idRoom = :id",
            ['id' => $id]
        );
        if ($room === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($room)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }
        $r = new Room(
            $room[0]['idRoom'] ?? null,
                $room[0]['title'] ?? null,
                $room[0]['description'] ?? null,
                $room[0]['maxMembers'] ?? null,
                $room[0]['dateCreation'] ?? null,
                $room[0]['idGamemode'] ?? null,
                $room[0]['nameGame'] ?? null,
                $room[0]['tag'] ?? null,
                $room[0]['idGamemode'] ?? null,
                $room[0]['nameGamemode'] ?? null,
        );



        return $r;
        //return Room::hydrate($room[0]);
    }
}