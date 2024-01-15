<?php 

namespace App\Controllers;


use App\Models\User;
use App\Controllers\AuthController;
use DB;

class UserController
{
    const URL_LOGIN = '/login.php';
    const URL_INDEX = '/index.php';
    const URL_ACCOUNT = '/account.php';

    /**
     * Display information about user
     */
    public function index(int $id)
    {
        $users = DB::fetch(
            // SQL
            "SELECT * FROM Users WHERE idUser = :id;", ['id' => $id]);



        // Hydrate user
        foreach ($users as $key => $value) {
            $user = new User();

            $user->setId($value['idUser']);
            $user->setUserName($value['username']);
            $user->setPassword($value['password']);
            $user->setEMail($value['mail']);
            $user->setProfilPicture($value['profilePicture']);
            $user->setNotificationEnabled(($value['notificationsEnabled']));
            $users[$key] = $user;
        }

        return $users;

    }


    /**
     * Create a new account
     */
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

            $auth = new AuthController;
            $auth->login($_POST['email'], $_POST['password']);

            header('Location: ' . self::URL_INDEX);
            exit();

        } else {
            $_SESSION['message'] = "L'utilisateur existe déja";
            $_SESSION['type'] = 'warning';

            header('Location: ' . self::URL_LOGIN);
            exit();
        }   

    }

    /**
     * Delete account
     */
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


    /**
     * Save Profil Picture
     */
    public function savePicture(): void
    {

        // TODO
        $uploadDir = 'public/uploads';

        // Je récupère l'extension du fichier
        $extension = pathinfo($_FILES['avatarPicture']['name'], PATHINFO_EXTENSION);

        $authorizedExtensions = ['jpg','png','gif'];

        // Le poids max géré par PHP par défaut est de 2M
        $maxFileSize = 1000000;

        // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client
        $uploadFile = $uploadDir . uniqid() .'.'.$extension;

        $errors = [];
        if( (!in_array($extension, $authorizedExtensions))){
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png !';
        }

        /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
        if( file_exists($_FILES['avatarPicture']['tmp_name']) && filesize($_FILES['avatarPicture']['tmp_name']) > $maxFileSize)
        {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        if(empty($errors)){

            move_uploaded_file($_FILES['avatarPicture']['tmp_name'], $uploadFile);

            $user = new User();
            $user->savePicture($_SESSION['user'],$uploadFile );

            header('Location: ' . self::URL_ACCOUNT);
            exit();


        }else{
            foreach($errors as $error){
                $_SESSION['message'] = "Une erreur s'est produite";
                $_SESSION['type'] = 'danger';
            }
        }

    }

    /**
     * Valid username and password
     */
    private function validateCredentials(string $userName, string $password) : bool
    {
        // Validation
        if (strlen($userName) < 2 or strlen($password) < 8) {
            return false;
        }

        return true;
    }




}

