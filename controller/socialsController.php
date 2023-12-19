<?php





    $dsn = 'mysql:host=localhost;port=3306;dbname=lightninghub';

    try {
        session_start();
        $db = new PDO($dsn, 'root', '');

        $id = $_SESSION['id'];
        $result_friends_connected = $db->query("SELECT * FROM users INNER JOIN isfriend ON users.idUser = isFriend.idUser1 where isfriend.idUser2 = '$id' and TIMESTAMPDIFF(MINUTE, lastConnection, NOW()) <= 5");
        $friends_connected = $result_friends_connected->fetchAll(PDO::FETCH_ASSOC);

        $result_friends_disconnected = $db->query("SELECT * FROM users INNER JOIN isfriend ON users.idUser = isFriend.idUser1 where isfriend.idUser2 = '$id' and TIMESTAMPDIFF(MINUTE, lastConnection, NOW()) > 5");
        $friends_disconnected = $result_friends_disconnected->fetchAll(PDO::FETCH_ASSOC);

        $current_user = $db->query("SELECT * FROM users where idUser = '$id'")->fetch(PDO::FETCH_ASSOC);
        //include('../public/socials.php');
       // require_once(__DIR__."/../public/socials.php");
    } catch (PDOException $e) {
        echo "ERROR ->". $e->getMessage() . '<br>';
        exit();
    }


require '../public/socials.php';

