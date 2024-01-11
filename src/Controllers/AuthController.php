<?php

namespace App\Controllers;


use App\Models\User;
use DB;

class AuthController
{
    const URL_LOGIN = '/login.php';
    const URL_HOME = '/index.php';


    public function login() : void
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
        if ($users == false) {
            $_SESSION['message'] = "Le compte utilisateur n'existe pas";
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

                if ($remember) {
                    
                    $expiration = time() + 30 * 24 * 60 * 60; // 30 jours * 24 heures * 60 minutes * 60 secondes
                    $delimiter = "//";
                    $cookieString = $email . $delimiter . password_hash($password, PASSWORD_DEFAULT);

                    setcookie( 'autoconnection', $cookieString, time() + $expiration, '/' );
                }

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
