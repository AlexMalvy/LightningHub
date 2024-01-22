<?php

namespace Tests;

use DB;
use App\Models\User;
use PHPUnit\Framework\TestCase;



class UserModelTest extends TestCase
{

    public function testSaveUser()
    {
        // Créez une instance de votre classe si nécessaire
        $user = new User();

        // Valeurs pour le nouvel utilisateur
        $user->setUserName('stephane');
        $user->setPassword('passwordtest');
        $user->setEMail('skoenuguer@free.com');

        $result = $user->save();

        // Assertions sur le résultat attendu
        $this->assertIsInt($result, 'Expected user ID to be an integer or false');
        $this->assertGreaterThan(0, $result, 'Expected user ID to be greater than 0 or false');

        // Effectue une requête pour vérifier que l'utilisateur a été ajouté à la base de données
        $userDatabase = DB::fetch("SELECT * FROM users WHERE idUser = :id", ['id' => $result]);

        // Assertions sur l'utilisateur récupéré de la base de données
        $this->assertCount(1, $userDatabase, 'Expected one user to be found in the database');
        $this->assertEquals('testuser', $userDatabase[0]->username, 'utilisateur attendu pour correspondre');
    }



    public function testSaveMail()
    {
        $user = new User();

        // Valeurs pour le nouvel utilisateur
        $user->setUserName('stephane');
        $user->setPassword('passwordtest');
        $user->setEMail('stephane@gmail.eu');

        $result = $user->save();

        // Méthode saveMail()
        $result = USER::saveMail($result, 'updateMail@example.com');

        // Assertions sur le résultat attendu
        $this->assertTrue($result, 'Expected update to be successful');

        // Effectue une requête pour vérifier que l'e-mail a été mis à jour dans la base de données
        $updatedUser = DB::fetch("SELECT * FROM Users WHERE idUser = :id", ['id' => $result]);

        // Assertions sur l'utilisateur mis à jour dans la base de données
        $this->assertCount(1, $updatedUser, 'Expected one user to be found in the database');
        $this->assertEquals('newemail@example.com', $updatedUser[0]->mail, 'Expected email to be updated');
    }


}