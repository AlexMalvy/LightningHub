<?php

namespace Tests;

use DB;
use App\Models\Room;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class RoomModelTest extends TestCase
{
    public function testUserSave()
    {
        // Créez une instance de votre classe si nécessaire
        $user = new User();
    
        // Valeurs pour le nouvel utilisateur
        $user->setUserName('stephane');
        $user->setPassword('passwordtest');
        $user->setEMail('skoeniguer@free.fr');
    
        $user = $user->save();
    
        // Assertions sur le résultat attendu
        $this->assertIsInt($user, "L'enregistrement a été réalisé");
    
        // Récupère l'id du dernièr enregistrment
        $userId = DB::getDB()->lastInsertId();
    
        // Effectue une requête pour vérifier que l'utilisateur a été ajouté à la base de données
        $userDatabase = DB::fetch("SELECT * FROM users WHERE idUser = :idUser", ['idUser' => $userId]);
    
    
        // Assertions sur l'utilisateur récupéré de la base de données
        $this->assertCount(1, $userDatabase, 'Un utilisateur a été trouvé dans la base de données');
        $this->assertEquals('stephane', $userDatabase[0]['username'], 'le username correspond');
    
        $idUser = $userDatabase[0]['idUser'];
        return $idUser;
    }

    /**
     * @depends testUserSave
     */
    public function testRoomCreate($idUser)
    {
        // Create a new room with created user
        Room::createNewRoom($idUser, "testRoomTitle", "testRoomDescription", 8, 2);

        // Get user's information from database
        $user = DB::fetch("SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $idUser]);

        // Check room's informations on user's database entry
        $this->assertCount(1, $user, "Check if only one user is retrieve from the database");
        $this->assertSame($idUser, $user[0]["idUser"], "Result from database is same user id");
        $this->assertNotSame(NULL, $user[0]["idRoom"], "Check if user is in a room");
        $this->assertSame(1, $user[0]["isRoomOwner"], "Check if user is room owner");

        // Get room's information on database
        $room = DB::fetch("SELECT *
        FROM rooms
        WHERE rooms.idRoom = :idRoom",
        ["idRoom" => $user[0]["idRoom"]]);

        // Check Room's informations on database
        $this->assertCount(1, $room, "Check if only one room is retrieve from the database");
        $this->assertSame(1, $room[0]["isEnabled"], "Check if the room is enabled");
        $this->assertSame("testRoomTitle", $room[0]["title"], "Check for the room's title");
        $this->assertSame("testRoomDescription", $room[0]["description"], "Check for the room's description");
        $this->assertSame(8, $room[0]["maxMembers"], "Check for the room's maxMembers");
        $this->assertSame(2, $room[0]["idGamemode"], "Check for the room's gamemodeId");

        // Send user and room ids to the next test
        $userRoomIds = ["idUser" => $idUser, "idRoom" => $user[0]["idRoom"]];
        return $userRoomIds;
    }

    /**
     * @depends testRoomCreate
     */
    public function testRoomModify($userRoomIds)
    {
        // Modify previously created room
        Room::modifyRoom($userRoomIds["idRoom"], "modifyRoomTitle", "modifyRoomDescription", 6, 3);

        // Get room's information on database
        $user = DB::fetch("SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $userRoomIds["idUser"]]);

        // Check room's informations on user's database entry
        $this->assertCount(1, $user, "Check if only one user is retrieve from the database");
        $this->assertSame($userRoomIds["idUser"], $user[0]["idUser"], "Result from database is same user id");
        $this->assertSame($userRoomIds["idRoom"], $user[0]["idRoom"], "Result from database is same room id");
        $this->assertNotSame(NULL, $user[0]["idRoom"], "Check if user is in a room");
        $this->assertSame(1, $user[0]["isRoomOwner"], "Check if user is room owner");

        // Get room's information on database
        $room = DB::fetch("SELECT *
        FROM rooms
        WHERE rooms.idRoom = :idRoom",
        ["idRoom" => $user[0]["idRoom"]]);

        // Check Room's informations on database
        $this->assertCount(1, $room, "Check if only one room is retrieve from the database");
        $this->assertSame(1, $room[0]["isEnabled"], "Check if the room is enabled");
        $this->assertSame("modifyRoomTitle", $room[0]["title"], "Check for the room's title");
        $this->assertSame("modifyRoomDescription", $room[0]["description"], "Check for the room's description");
        $this->assertSame(6, $room[0]["maxMembers"], "Check for the room's maxMembers");
        $this->assertSame(3, $room[0]["idGamemode"], "Check for the room's gamemodeId");

        // Send user and room ids to the next test
        $userRoomIds = ["idUser" => $user[0]["idUser"], "idRoom" => $user[0]["idRoom"]];
        return $userRoomIds;
    }

    /**
     * @depends testRoomModify
     */
    public function testRoomDelete($userRoomIds)
    {
        // Delete previously created room
        Room::deleteRoom($userRoomIds["idRoom"]);

        // Get room's information on database
        $user = DB::fetch("SELECT users.idUser, users.isRoomOwner, users.idRoom
        FROM users
        WHERE users.idUser = :idUser",
        ["idUser" => $userRoomIds["idUser"]]);

        // Check room's informations on user's database entry
        $this->assertCount(1, $user, "Check if only one user is retrieve from the database");
        $this->assertSame($userRoomIds["idUser"], $user[0]["idUser"], "Result from database is same user id");
        $this->assertSame(NULL, $user[0]["idRoom"], "Check if user is NOT in a room");
        $this->assertSame(0, $user[0]["isRoomOwner"], "Check if user is NOT room owner");

        // Get room's information on database
        $room = DB::fetch("SELECT *
        FROM rooms
        WHERE rooms.idRoom = :idRoom",
        ["idRoom" => $userRoomIds["idRoom"]]);

        // Check Room's informations on database
        $this->assertCount(1, $room, "Check if only one room is retrieve from the database");
        $this->assertSame(0, $room[0]["isEnabled"], "Check if the room is disabled");
    }


}