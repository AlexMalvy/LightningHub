<?php

$error_message = "Identifiants invalides";
if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['password'])) {
    session_start();
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $pseudo = $_POST['nickname'];
    $registerDate = date("Y-m-d H:i:s");

//    RECHERCHE BON ID

    $dsn = 'mysql:host=localhost;port=3306;dbname=lightninghub';


    try {
        $db = new PDO($dsn, 'root', '');

        $result = $db->exec("INSERT INTO users (username, password, mail, profilePicture, signUpDate, lastConnection, notificationsEnabled, isAdmin, isRoomOwner, idRoom) 
                                                  VALUES ('$pseudo','$password', '$mail', '../public/assets/images/avatar.jpg', '$registerDate', '$registerDate', '0', '0', '0', Null)");
    } catch (PDOException $e) {
        echo $e->getMessage() . '<br>';
        exit();
    }

//    $_SESSION['mail'] = $mail;
//    $_SESSION['pwd'] = $pwd;
    header("Location: ../public/login.php");

    // header("Location: index.php");
}
// Puis une redirection PHP de la requête

exit();