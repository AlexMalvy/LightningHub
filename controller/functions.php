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

function display_rooms(int $limit = 25) {
    $db = connect_to_db();
    $req = $db->prepare("SELECT rooms.idRoom, rooms.title, rooms.description, rooms.maxMembers, rooms.dateCreation, gamemodes.nameGamemode, games.tag, users.username , users.isRoomOwner
    FROM rooms
        INNER JOIN gamemodes
        ON rooms.idGamemode = gamemodes.idGamemode
            INNER JOIN games
            ON gamemodes.idGame = games.idGame
        INNER JOIN users
        ON rooms.idRoom = users.idRoom
    ORDER BY rooms.idRoom ASC");
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_time_since_room_creation($room_date, $current_date) {
    $date_diff = date_diff($room_date, $current_date);
    $hours = intval($date_diff->format('%H'));
    if ($hours !== 0) {
        $minutes_since_creation = "Plus d'une heure";
    } else {
        $minutes = intval($date_diff->format('%i'));
        $minutes_since_creation = 60 - ($minutes);
        $minutes_since_creation = $minutes_since_creation . " min";
    }
    return $minutes_since_creation;
}