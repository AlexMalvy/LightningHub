<?php

namespace Tests;

use DB;
use App\Models\User;
use PHPUnit\Framework\TestCase;



class UserModelTest extends TestCase
{

    public function testSave()
    {
        // Créez une instance
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

        return $userId;
    }


    /**
     * @depends testSave
     */
    public function testSaveMail($userId)
    {

        // Mise à jour du champ mail
        $newMail = 'update@mail.com';
        $result = User::saveMail($userId, $newMail);

        // Assertions sur le résultat attendu
        $this->assertIsInt($result, 'La mise à jour du mail a été réalisé');

        // Vérifie si le champ mail a été correctement mis à jour dans la base de données
        $updatedUser = DB::fetch("SELECT * FROM users WHERE idUser = :id", ['id' => $userId]);

        // Assertions sur le champ mail mis à jour
        $this->assertEquals($newMail, $updatedUser[0]['mail'], 'Le champ mail correspond mis à jour');
    }

}