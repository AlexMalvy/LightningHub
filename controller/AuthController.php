<?php

namespace controller;

require_once __DIR__.'/../bootstrap/app.php';

use DB;
use Models\User;

class AuthController
{
    const URL_LOGIN = '/login.php';
    const URL_HOME = '/index.php';


    public function login() : void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Check DB
        $users = DB::fetch("SELECT * FROM Users WHERE mail = :email;", ['email' => $email]);
        if ($users === false) {
            $_SESSION['message'] = "Une erreur est survenue. Veuillez ré-essayer plus tard.";
            $_SESSION['type'] = 'danger';
            $_SESSION['isConnected'] = false;

            header('Location: ' . self::URL_LOGIN);
            exit();
        }

        // Check user retrieved
        if (count($users) >= 1) {
            $user = $users[0];

            // Check password hashing
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['idUser'];
                $_SESSION['isConnected'] = true;

                $user = new User(
                    $user['idUser'],
                    $user['mail'],
                    $user['password'],
                );

                $user->setDateLastConnection(new \DateTimeImmutable);
                $user->updateDateLastConnection();

                header('location: ' . self::URL_HOME);
                exit();
            }
        }

        $_SESSION['message'] = "Les identifiants ne correspondes pas.";
        $_SESSION['type'] = 'danger';
        $_SESSION['isConnected'] = false;
 
        header('Location: ' . self::URL_LOGIN);
        exit();
    }

    public function logout() : void
    {
        session_destroy();
        
        header('location: ' . self::URL_HOME);
        exit();
    }




}