<?php

namespace App\Controllers;


use App\Models\User;
use DB;

class AuthController
{
    const URL_LOGIN = '/login.php';
    const URL_HOME = '/index.php';

    /**
     * Login user
     */
    public function login(string $login = null, string $password = null ) : void
    {
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $remember = $_POST['rememberme'] ?? false;
        } 
        // TODO Cookies
        // else {
        //     $email = $email;
        //     $password = $password;
        // }
    
        // Check DB
        $users = DB::fetch("SELECT * FROM Users WHERE mail = :email;", ['email' => $email]);
        if (!$users) {
            $_SESSION['message'] = "Le compte utilisateur n'existe pas";
            $_SESSION['type'] = 'danger';
            $_SESSION['isConnected'] = false;


            redirectAndExit(self::URL_LOGIN);
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


                $user->setLastConnection(new \DateTimeImmutable);
                $user->updateDateLastConnection();

                if ($remember) {
                    
                    $expiration = time() + 30 * 24 * 60 * 60; // 30 jours * 24 heures * 60 minutes * 60 secondes
                    $delimiter = "//";
                    $cookieString = $email . $delimiter . password_hash($password, PASSWORD_DEFAULT);

                    setcookie( 'autoconnection', $cookieString, time() + $expiration, '/' );
                }

                redirectAndExit(self::URL_HOME);
            }
        }

        $_SESSION['message'] = "Les identifiants ne correspondes pas.";
        $_SESSION['type'] = 'danger';
        $_SESSION['isConnected'] = false;

        redirectAndExit(self::URL_LOGIN);
    }

    /**
     * Logout user
     */
    public function logout() : void
    {
        session_destroy();
        
        redirectAndExit(self::URL_HOME);
    }

}

