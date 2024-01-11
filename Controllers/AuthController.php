<?php

namespace Controllers;

require_once 'Controller.php';

use Auth;
use DB;

class AuthController extends Controller
{
    const URL_HANDLER = '/handlers/auth-handlers.php';
    const URL_REGISTER = '/register.php';
    const URL_LOGIN = '/login.php';
    const URL_AFTER_LOGIN = '/home.php';
    const URL_AFTER_LOGOUT = '/';

    public function login() : void
    {
        $actionUrl = self::URL_HANDLER;
        require_once base_path('views/auth/login.php');
    }

    public function register() : void
    {
        $actionUrl = self::URL_HANDLER;
        require_once base_path('views/auth/register.php');
    }

    public function store() : void
    {
        // Prepare POST
        $name = $_POST['name'] ?? '';
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        $_SESSION['old'] = [
            'name' => $name,
            'login' => $login,
            'password' => $password,
        ];

        // Validation
        if (strlen($name) < 2 or !$this->validateCredentials($login, $password)) {
            errors("Le champs nom doit avoir au moins 2 charactères.");
            errors("Le champs d'e-mail doit avoir au moins 6 charactères.");
            errors("Le champs de mot de passe doit avoir au moins 8 charactères");
            redirectAndExit('/register.php');
        }

        // Check User
        $users = DB::fetch("SELECT * FROM users WHERE email = :login;", ['login' => $login]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_REGISTER);
        } elseif (count($users) >= 1) {
            errors('Cette adresse email est déjà utilisée.');
            redirectAndExit(self::URL_REGISTER);
        }

        // Version 2: Secure password with hash method
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Create new user
        $result = DB::statement(
            "INSERT INTO users(email, password, name)"
            ." VALUE(:login, :password, :name);",
            [
                'login' => $login,
                'password' => $password,
                'name' => $name,
            ]
        );
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_REGISTER);
        }

        // Auth new user
        $_SESSION[Auth::getSessionUserIdKey()] = DB::getDB()->lastInsertId();

        // Clear old
        unset($_SESSION['old']);

        // Message + Redirection
        success('Vous êtes maintenant connecté.');
        redirectAndExit(self::URL_AFTER_LOGIN);
    }

    public function check() : void
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validation
        if (!$this->validateCredentials($login, $password)) {
            errors("Le champs d'e-mail doit avoir au moins 6 charactères.");
            errors("Le champs de mot de passe doit avoir au moins 8 charactères");
            redirectAndExit(self::URL_LOGIN);
        }

        // Check DB
        $users = DB::fetch("SELECT * FROM users WHERE email = :login;", ['login' => $login]);
        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_LOGIN);
        }

        // Check user retrieved
        if (count($users) >= 1) {
            $user = $users[0];

            // Version 2: with password hashing
            if (password_verify($password, $user['password'])) {
                $_SESSION[Auth::getSessionUserIdKey()] = $user['id'];
                redirectAndExit(self::URL_AFTER_LOGIN);
            }
        }

        errors("Les identifiants ne correspondes pas.");
        redirectAndExit(self::URL_LOGIN);
    }

    public function validateCredentials(string $login, string $password) : bool
    {
        // Validation
        if (strlen($login) < 6 or strlen($password) < 8) {
            return false;
        }

        return true;
    }

    public function logout() : void
    {
        session_destroy();
        redirectAndExit(self::URL_AFTER_LOGOUT);
    }
}


