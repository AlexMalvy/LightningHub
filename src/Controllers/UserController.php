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
     * Display information about one user
     */
    public function index(int $id)
    {
        $users = DB::fetch(
            // SQL
            "SELECT * FROM Users WHERE idUser = :id;", ['id' => $id]);

        return $this->hydrate($users);

    }

    /**
     * Display information about all user
     */
    public function selectAllUsers()
    {
        $users = DB::fetch("SELECT * FROM Users");

        return $this->hydrate($users);
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

            redirectAndExit(self::URL_LOGIN);
        }

        if (!$adult or !$cgu) {
            $_SESSION['message'] = "Veuillez confirmer que vous êtes majeur et que vous accepté les conditions d'utilisations.";
            $_SESSION['type'] = 'danger';

            redirectAndExit(self::URL_LOGIN);
        }

        // check format email
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Le format de l'e-mail n'est pas valide.";
            $_SESSION['type'] = 'danger';

            redirectAndExit(self::URL_LOGIN);
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

            redirectAndExit(self::URL_INDEX);

        } else {
            $_SESSION['message'] = "L'utilisateur existe déja";
            $_SESSION['type'] = 'warning';

            redirectAndExit(self::URL_LOGIN);
        }   

    }

    /**
     * Delete account
     */
    public function delete(): void
    {
        $id = $_SESSION['user'];

        // Delete account
        User::deleteAccount($id);
        $_SESSION['message'] = "Votre compte a bien été supprimé";
        $_SESSION['isConnected'] = false;

        redirectAndExit(self::URL_INDEX);
    }


    /**
     * Update User Username
     */
    public static function updateUsername(int $id): void
    {
        User::saveUsername($id,$_POST['pseudo'] );

        redirectAndExit(self::URL_ACCOUNT);
    }

    /**
     * Update User Mail
     */
    public static function updateEmail(int $id): void
    {
        // check format email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['message'] = "Le format de l'e-mail n'est pas valide.";
                    $_SESSION['type'] = 'danger';

        } else {
            User::saveMail($id,$_POST['email'] );
        }

        redirectAndExit(self::URL_ACCOUNT);
    }

    /**
     * Update User Notification
     */
    public static function updateNotification(int $id): void
    {

        User::saveNotification($id,$_POST['notification'] ?? false );

        redirectAndExit(self::URL_ACCOUNT);
    }

    /**
     * Save Profil Picture
     */
    public function savePicture(): void
    {
        // Save Profile Picture directory
        $uploadDir = '../../public/uploads/';

        // I retrieve the file extension.
        $extension = pathinfo($_FILES['avatarPicture']['name'], PATHINFO_EXTENSION);

        $authorizedExtensions = ['jpg','png','gif','jfif'];

        // The maximum weight handled by PHP by default is 2MB.
        $maxFileSize = 1000000;

        // The server-side file name is generated here based on the client-side file name.
        $uploadFile = $uploadDir . uniqid() .'.'.$extension;

        $errors = [];
        if( (!in_array($extension, $authorizedExtensions))){
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png !';
        }

        // Check if the image exists and if the weight is allowed in bytes.
        if( file_exists($_FILES['avatarPicture']['tmp_name']) && filesize($_FILES['avatarPicture']['tmp_name']) > $maxFileSize)
        {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        if(empty($errors)){

            move_uploaded_file($_FILES['avatarPicture']['tmp_name'], $uploadFile);

            $user = new User();
            $user->savePicture($_SESSION['user'],$uploadFile );

            redirectAndExit(self::URL_ACCOUNT);

        }else{
            foreach($errors as $error){
                $_SESSION['message'] = "Une erreur s'est produite";
                $_SESSION['type'] = 'danger';
            }
        }

        redirectAndExit(self::URL_ACCOUNT);
    }

    /**
     * hydrate User
     */
    private function hydrate($users)
    {
        // Hydrate user
        foreach ($users as $key => $value) {
            $user = new User();

            $user->setId($value['idUser']);
            $user->setUserName($value['username']);
            $user->setPassword($value['password']);
            $user->setEMail($value['mail']);
            $user->setProfilePicture($value['profilePicture']);
            $user->setNotificationEnabled(($value['notificationsEnabled']));
            $user->setIsAdmin($value['isAdmin']);
            $users[$key] = $user;
        }

        return $users;
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
