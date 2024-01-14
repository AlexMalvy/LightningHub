<?php 

namespace App\Controllers;


use App\Models\User;
use DB;

class UserController
{
    const URL_LOGIN = '/login.php';
    const URL_INDEX = '/index.php';


    public function index(int $id)
    {
        $users = DB::fetch(
            // SQL
            "SELECT * FROM Users WHERE idUser = :id;", ['id' => $id]);


        // Hydrate user
        foreach ($users as $key => $value) {
            $users[$key] = User::hydrate($value);
        }

        return $users;

    }


    public function store(): void
    {
        // Prepare POST
        $userName = $_POST['nickname'] ?? '';
        $mail = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $adult = $_POST['adult'] ?? '';
        $cgu = $_POST['cgu'] ?? '';

    
        // Validation
        if (!$this->validateCredentials($userName, $password)) {
            $_SESSION['message'] = "Votre nom d'utilisateur doit avoir au moins 2 charactères,<br>
            Votre email doit avoir au moins 6 charactères,<br>
            Votre mot de passe doit avoir au moins 8 charactères";
            $_SESSION['type'] = 'danger';
            $_SESSION['isConnected'] = false;

            header('Location: ' . self::URL_LOGIN);
            exit();
        }

        if (!$adult or !$cgu) {
            $_SESSION['message'] = "Veuillez confirmer que vous êtes majeur et que vous accepté les conditions d'utilisations.";
            $_SESSION['type'] = 'danger';

            header('Location: ' . self::URL_LOGIN);
            exit();
        }

        // check format email
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Le format de l'e-mail n'est pas valide.";
            $_SESSION['type'] = 'danger';
            
            header('Location: ' . self::URL_LOGIN);
            exit();
        }

        $user = new User(
            $_POST['nickname'],
            $_POST['email'], 
            $_POST['password']
        );

        if (!$user->AlreadyExistUser()) {
            $user->save();
            $_SESSION['message'] = "Votre compte a bien été créé";

            header('Location: ' . self::URL_INDEX);
            exit();

        } else {
            $_SESSION['message'] = "L'utilisateur existe déja";
            $_SESSION['type'] = 'warning';

            header('Location: ' . self::URL_LOGIN);
            exit();
        }   

    }

    public function delete()
    {
        $id = $_SESSION['user'];

        // Delete account
        User::deleteAccount($id);
        $_SESSION['message'] = "Votre compte a bien été supprimé";
        $_SESSION['isConnected'] = false;

        header('Location: ' . self::URL_INDEX);
        exit();
    }

    private function validateCredentials(string $userName, string $password) : bool
    {
        // Validation
        if (strlen($userName) < 2 or strlen($password) < 8) {
            return false;
        }

        return true;
    }
}