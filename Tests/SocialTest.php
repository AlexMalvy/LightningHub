<?php

namespace Models;

use App\Models\Social;
use App\Models\User;
use DB;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

class SocialTest extends TestCase
{
    public function testHydrate()
    {
        $data = [
            'idUser1' => 1,
            'idUser2' => 2,
            'accepted' => 1,
        ];

        // Call the hydrate method
        $result = Social::hydrate($data);

        // Assert that the returned object is an instance of Social
        $this->assertInstanceOf(Social::class, $result);

        // Assert that the properties of the object are set correctly
        $this->assertEquals($data['idUser1'], $result->getIdUser1());
        $this->assertEquals($data['idUser2'], $result->getIdUser2());
        $this->assertEquals($data['accepted'], $result->getAccepted());
    }

    public function testGettersAndSetters()
    {
        // Create an instance of Social
        $social = new Social(3,5,0);

        // Test setIdUser1 and getIdUser1 methods
        $social->setIdUser1(1);
        $this->assertEquals(1, $social->getIdUser1());

        // Test setIdUser2 and getIdUser2 methods
        $social->setIdUser2(2);
        $this->assertEquals(2, $social->getIdUser2());

        // Test setAccepted and getAccepted methods
        $social->setAccepted(1);
        $this->assertEquals(1, $social->getAccepted());

    }

    /**
     * @throws RandomException
     */
    public function testInsert(){
        $user1 = new User('ismael', $this->generateRandomString(), 'pwd');
        $user1->save();
        $user1ID = DB::getDB()->lastInsertId();

        $user2 = new User('nhf', $this->generateRandomString(), 'pwd');
        $user2->save();
        $user2ID = DB::getDB()->lastInsertId();

        $social = new Social($user1ID, $user2ID, 1);
        $social->insert();
        //$socialID = DB::getDB()->lastInsertId();

        // Effectue une requête pour vérifier que l'amitié a été ajouté à la base de données
        $socialDB = DB::fetch("SELECT * FROM isfriend WHERE idUser1 = :id1 and idUser2 = :id2".
                                        " or idUser1 = :id2 and idUser2 = :id1",
                                        ['id1' => $user1ID,
                                            'id2' => $user2ID]);
        echo $user1ID . " and " . $user2ID . "   ";

        $socialObj = Social::hydrate($socialDB[0]);
        // Assertions sur l'utilisateur récupéré de la base de données
        $this->assertCount(1, $socialDB, 'Expected one user to be found in the database');


        $this->assertEquals(1, $socialObj->getAccepted(), 'social attendu pour correspondre');

    }

    /**
     * @throws RandomException
     */
    function generateRandomString($length = 10): string
    {
        // Ensure the length is at least 1
        $length = max(1, $length);

        // Generate random binary data
        $randomBytes = random_bytes($length);

        // Convert binary data to a hexadecimal string
        return bin2hex($randomBytes);
    }
}
