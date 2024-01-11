<?php

$error_message = "Identifiants invalides";
if (isset($_POST['email']) && isset($_POST['password'])) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

//    RECHERCHE BON ID

    $dsn = 'mysql:host=localhost;port=3306;dbname=lightninghub';

    try {
        $db = new PDO($dsn, 'root', '');

        $result = $db->query("SELECT * FROM users where mail = '$email'");
        $user = $result->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "ERROR ->". $e->getMessage() . '<br>';
        exit();
    }


    if ($user) {
        if (password_verify($password, $user['password']))
        {
            $_SESSION['id'] = $user['idUser'];
            header("Location: ../public/index.php");
        }
        else{

            $_SESSION['error_msg'] = "Identifiants invalides";

            header("Location: ../public/login.php");
        }


    }
    else{ // Mail inexistant
        $_SESSION['error_msg'] = "Identifiants invalides";


        header("Location: ../public/login.php");
    }
}

exit();