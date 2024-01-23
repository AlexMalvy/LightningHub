<?php

namespace Tests;

use DB;
use App\Models\User;
use PHPUnit\Framework\TestCase;



class UserModelTest extends TestCase
{

    public function testSave()
    {
        // Créez une instance de votre classe si nécessaire
        $user = new User();

        // Valeurs pour le nouvel utilisateur
        $user->setUserName('stephane');
        $user->setPassword('passwordtest');
        $user->setEMail('skoeniguer@free.fr');

        $result = $user->save();

        // Assertions sur le résultat attendu
        $this->assertIsInt($result, "user l'Id doit être un entier");

        // Effectue une requête pour vérifier que l'utilisateur a été ajouté à la base de données
        $userDatabase = DB::fetch("SELECT * FROM users WHERE username = :username", ['username' => "stephane"]);

        // Assertions sur l'utilisateur récupéré de la base de données
        $this->assertCount(1, $userDatabase, 'Un utilisateur a été trouvé dans la base de données');
        $this->assertEquals('stephane', $userDatabase[0]['username'], 'le username correspond');
    }




}