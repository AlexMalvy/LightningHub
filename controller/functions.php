<?php

function connect_to_db() {
    try {
        $db = new PDO("mysql:host=localhost;port=3306;dbname=lightninghub", "lightninghubadmin", "lightninghubcorporation");
    } catch (PDOException $e) {
        print $e->getMessage() . "<br>";
        exit();
    }
    return $db;
}

function display_games(int $limit = 0) {
    $db = connect_to_db();
    if ($limit > 0) {
        $req = $db->prepare("SELECT * FROM games LIMIT $limit");
    } else {
        $req = $db->prepare("SELECT * FROM games");
    }
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}