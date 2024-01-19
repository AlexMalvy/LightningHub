<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Hub</title>
    <link rel="icon" type="image/png" href="assets/images/logo-lightninghub.png">
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php

    use App\Models\Filters;
    use App\Models\Hub;

    require_once(__DIR__."/../bootstrap/app.php")
    ?>
    
    <?php require_once(__DIR__."/../view/header_nav.php") ?>
    
    <?php
    if (empty($_SESSION["user"])) {
        $_SESSION["user"] = NULL;
    }

    $_SESSION["user"] = 10;

    $filteredGame = NULL;
    $filteredGamemode = NULL;
    $filteredSearch = NULL;
    if (!empty($_GET["game"])) {
        $filteredGame = $_GET["game"];
    }
    if (!empty($_GET["game_type"])) {
        $filteredGamemode = $_GET["game_type"];
    }
    if (!empty($_GET["search"])) {
        $filteredSearch = $_GET["search"];
    }

    $currentHub = new Hub($_SESSION["user"], $filteredGame, $filteredGamemode, $filteredSearch);

    $counter = 0;
    $filters = new Filters();
    ?>
    <!-- Passing gamemodes value to js -->
    <script>
        const gamemodes = <?php print(json_encode($filters->filtersList)) ?>;
    </script>

    <!-- Main -->
    <main class="mt-lg-5 pt-lg-5">

        <!-- Page Title -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 my-3">
            <h1 class="reconstruct">hub</h1>
        </div>

        <!-- Messages -->
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="container">
                <div class="col-lg-8 offset-lg-2 alert alert-<?=$_SESSION['type']?>" role="alert">
                    <?php echo '<span class="text-white">' . $_SESSION['message'] . '</span>'?>
                </div>
            </div>
        <?php unset($_SESSION['message']);
            unset($_SESSION['type']);
        ?>
        <?php endif; ?>


        <!-- Filters + Create Hub -->
        <div class="row mx-0 align-items-center">

            <!-- Filters -->
            <div class="col-lg-4 offset-lg-1 px-2 px-md-5 px-lg-0 mb-3">
                <!-- Toggle Button -->
                <button class="btn lh-buttons-purple rounded-0 w-100 d-flex justify-content-between align-items-center py-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFiltre" aria-controls="offcanvasFiltre">
                Filtres   
                <i class="fa-solid fa-plus fa-2xl" style="color: #ffffff;"></i>
                </button>

                <!-- OffCanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFiltre" aria-labelledby="offcanvasFiltreLabel">

                    <!-- Header -->
                    <div class="offcanvas-header">
                        <h2 class="offcanvas-title" id="offcanvasFiltreLabel">Filtres</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="offcanvas-body">
                        <form action="hub.php" method="GET" name="filters" class="d-flex flex-column py-3">
                            <label for="game" class="pb-1">Jeu</label>
                            <select name="game" id="game" class="mb-3 input">
                                <option value="">Tout</option>
                                <?php foreach ($filters->filtersList as $gameId => $allGames): ?>
                                    <?php foreach ($allGames as $game => $mode): ?>
                                        <?php
                                        if ($counter === 0) {
                                            $firstGamemodes = $mode;
                                            $counter += 1;
                                        }
                                        ?>
                                        <option value="<?php print($game) ?>" game_id="<?php print($gameId) ?>"><?php print($game) ?></option>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </select>

                            <label for="game_type" class="pb-1">Type de partie</label>
                            <select name="game_type" id="game_type" class="mb-3 input">
                                    <option value="">Tout</option>
                                <?php foreach ($firstGamemodes as $gamemodeId => $gamemodeName): ?>
                                    <option value="<?php print($gamemodeName) ?>"><?php print($gamemodeName) ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label for="search" class="pb-1">Recherche</label>
                            <input type="search" name="search" id="search" class="mb-5 input">

                            <button type="submit" class="btn lh-buttons-purple w-100 mb-3">Valider</button>

                            <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="btn lh-buttons-purple-faded w-100">Annuler</button>
                        </form>
                    </div>

                </div>

            </div>

            <!-- Create Hub -->
            <?php if (!$currentHub->userIsOwner): ?>
                <div class="col-lg-2 offset-lg-4 px-2 px-md-5 px-lg-0 mb-3 d-flex justify-content-lg-end">
                    <button id="newRoom" aria-controls="create-room-button" aria-selected="false" class="btn lh-buttons-purple">Créer un salon</button>
                </div>
            <?php endif ?>

        </div>

        <!-- Hub -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 mb-3 hub">

            <!-- Tabs -->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">

                <!-- Hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white hover-accent-shadow focus-accent-shadow 
                        <?php if (empty($currentHub->connectedUserRoom)) {print("active");} ?>" 
                        id="hub-tab" data-bs-toggle="tab" data-bs-target="#hub-tab-pane" type="button" role="tab" aria-controls="hub-tab-pane" 
                        aria-selected="<?php if (empty($currentHub->connectedUserRoom)) {print("true");} ?>">
                        Hub
                    </button>
                </li>

                <!-- Friends tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white hover-accent-shadow focus-accent-shadow" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends-tab-pane" type="button" role="tab" aria-controls="friends-tab-pane" aria-selected="false">Mes Amis</button>
                </li>

                <!-- Pending tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white hover-accent-shadow focus-accent-shadow" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="false">En attente</button>
                </li>

                <!-- Current hub tab head -->
                <?php if (!empty($currentHub->connectedUserRoom)): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-white hover-accent-shadow focus-accent-shadow active" id="current-hub-tab" data-bs-toggle="tab" data-bs-target="#current-hub-tab-pane" type="button" role="tab" aria-controls="current-hub-tab-pane" aria-selected="true">Chat</button>
                    </li>
                <?php endif ?>

                <!-- New Room hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white hover-accent-shadow focus-accent-shadow d-none" id="new-room-hub-tab" data-bs-toggle="tab" data-bs-target="#new-room-hub-tab-pane" type="button" role="tab" aria-controls="new-room-hub-tab-pane" aria-selected="false">Nouveau salon</button>
                </li>

                <!-- Update Room hub tab head -->
                <?php if (!empty($currentHub->connectedUserRoom)): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-white hover-accent-shadow focus-accent-shadow d-none" id="update-room-hub-tab" data-bs-toggle="tab" data-bs-target="#update-room-hub-tab-pane" type="button" role="tab" aria-controls="update-room-hub-tab-pane" aria-selected="false">Modifier le salon</button>
                    </li>
                <?php endif ?>
            </ul>

            <!-- Content -->
            <div class="tab-content bg-color-purple-faded" id="myTabContent">

                <!-- Hub tab content -->
                <div class="tab-pane fade show p-1 <?php if (empty($currentHub->connectedUserRoom)) {print("active");} ?> border" id="hub-tab-pane" role="tabpanel" aria-labelledby="hub-tab" tabindex="0">

                    <div class="container-fluid p-3">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3">

                            <!-- Display All Rooms -->
                            <?php foreach($currentHub->allRoomsList as $room): ?>
                                    <!-- Room -->
                                    <article class="col">
                                        <div class="card h-100">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <p class="fs-5 m-0 pe-2"><?php print(count($room->members)."/".$room->maxMembers) ?></p>
                                                    <i class="fa-solid fa-user fa-xl text-white"></i>
                                                </div>

                                                <?php 
                                                if (!empty($_SESSION["user"])) {
                                                    $room->getNumberOfFriend($currentHub->friendRoomsList);
                                                    if (count($room->friendList)) {
                                                        print('<div class="px-2 fs-5 rounded bg-success">'.count($room->friendList).' amis</div>');
                                                    }
                                                }
                                                ?>

                                                <div class="px-2 fs-5 rounded-5 game-tag-color"><?php print($room->gameTag) ?></div>
                                            </div>

                                            <div class="card-body">
                                                <h2 class="card-title m-0 pb-1"><?php print($room->title) ?></h2>

                                                <p class="card-subtitle fst-italic pb-2"><?php print("Créer par ".$room->owner."#".$room->ownerId) ?></p>

                                                <p class="card-text"><?php print($room->description) ?></p>
                                            </div>

                                            <div class="card-footer d-flex justify-content-between align-items-center">
                                                <?php if(empty($currentHub->connectedUserRoom)): ?>
                                                    <?php if(in_array($room->roomId, $currentHub->pendingRoomsIdList)): ?>
                                                        <form action="handlers/room-handler.php" method="POST">
                                                            <input type="text" name="action" value="cancel" hidden>
                                                            <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                            <button type="submit" class="btn lh-buttons-purple-faded-to-red" id="button_<?php print($room->roomId) ?>"></button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form action="handlers/room-handler.php" method="POST">
                                                            <input type="text" name="action" value="join" hidden>
                                                            <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                            <button type="submit" class="btn lh-buttons-purple">Rejoindre</button>
                                                        </form>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($room->roomId !== $currentHub->connectedUserRoom->roomId and !$currentHub->userIsOwner): ?>
                                                        <?php if(in_array($room->roomId, $currentHub->pendingRoomsIdList)): ?>
                                                            <form action="handlers/room-handler.php" method="POST">
                                                                <input type="text" name="action" value="cancel" hidden>
                                                                <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                                <button type="submit" class="btn lh-buttons-purple-faded-to-red" id="button_<?php print($room->roomId) ?>"></button>
                                                            </form>
                                                        <?php else: ?>
                                                            <form action="handlers/room-handler.php" method="POST">
                                                                <input type="text" name="action" value="join" hidden>
                                                                <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                                <button type="submit" class="btn lh-buttons-purple">Rejoindre</button>
                                                            </form>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <p class="m-0"><?php print($room->CreatedSince()); ?></p>
                                            </div>
                                        </div>
                                    </article>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>

                <!-- Friends tab content -->
                <div class="tab-pane fade show p-1 border" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">

                    <div class="container-fluid py-3">
                        <div class="row row-cols-1 row-cols-lg-4 g-3">
                            
                            <?php foreach($currentHub->allRoomsList as $room): ?>
                                <?php if(count($room->friendList) > 0): ?>
                                    <!-- Room -->
                                    <article class="col">
                                        <div class="card h-100">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <p class="fs-5 m-0 pe-2"><?php print(count($room->members)."/".$room->maxMembers) ?></p>
                                                    <i class="fa-solid fa-user fa-xl text-white"></i>
                                                </div>

                                                <?php 
                                                print('<div class="px-2 fs-5 rounded bg-success">'.count($room->friendList).' amis</div>');
                                                ?>

                                                <div class="px-2 fs-5 rounded-5 game-tag-color"><?php print($room->gameTag) ?></div>
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-title m-0 pb-1"><?php print($room->title) ?></h2>

                                                <p class="card-subtitle fst-italic pb-2"><?php print("Créer par ".$room->owner."#".$room->ownerId) ?></p>

                                                <p class="card-text"><?php print($room->description) ?></p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between align-items-center">
                                            <?php if(empty($currentHub->connectedUserRoom)): ?>
                                                <?php if(in_array($room->roomId, $currentHub->pendingRoomsIdList)): ?>
                                                    <form action="handlers/room-handler.php" method="POST">
                                                        <input type="text" name="action" value="cancel" hidden>
                                                        <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                        <button type="submit" class="btn lh-buttons-purple-faded-to-red" id="button_<?php print($room->roomId) ?>"></button>
                                                    </form>
                                                <?php else: ?>
                                                    <form action="handlers/room-handler.php" method="POST">
                                                        <input type="text" name="action" value="join" hidden>
                                                        <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                        <button type="submit" class="btn lh-buttons-purple">Rejoindre</button>
                                                    </form>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($room->roomId !== $currentHub->connectedUserRoom->roomId and !$currentHub->userIsOwner): ?>
                                                    <?php if(in_array($room->roomId, $currentHub->pendingRoomsIdList)): ?>
                                                        <form action="handlers/room-handler.php" method="POST">
                                                            <input type="text" name="action" value="cancel" hidden>
                                                            <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                            <button type="submit" class="btn lh-buttons-purple-faded-to-red" id="button_<?php print($room->roomId) ?>"></button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form action="handlers/room-handler.php" method="POST">
                                                            <input type="text" name="action" value="join" hidden>
                                                            <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                            <button type="submit" class="btn lh-buttons-purple">Rejoindre</button>
                                                        </form>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                                <p class="m-0"><?php print($room->CreatedSince()); ?></p>
                                            </div>
                                        </div>
                                    </article>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>

                <!-- Pending tab content -->
                <div class="tab-pane fade show p-1 border" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">

                    <div class="container-fluid py-3">
                        <!-- If owner -->
                        <?php if($currentHub->userIsOwner): ?>
                            <div class="row row-cols-1 g-2">
                                    <article class="col d-flex justify-content-between align-items-center bg-color-purple p-2">
                                        <div class="col-lg-8">Nom d'utilisateur</div>
                                        <div class="col-lg-2">Heure de la demande</div>
                                        <div class="col-lg-2 text-center">Actions</div>
                                    </article>
                                <!-- Atleast 1 request -->
                                <?php if(count($currentHub->usersRequestingToJoin) > 0): ?>
                                    <?php foreach($currentHub->usersRequestingToJoin as $user): ?>
                                        <article class="col d-flex flex-column flex-md-row justify-content-between align-items-center p-2 border">
                                            <div class="d-flex justify-content-between align-items-center w-100 px-1 px-md-0">
                                                <div><?php print($user["username"]."#".$user["idUser"]) ?></div>
                                                <div class="ms-auto"><?php print((new DateTimeImmutable($user["timeRequest"]))->format("H:i")) ?></div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <form action="handlers/room-handler.php" method="POST" class="ms-5">
                                                    <input type="text" name="action" value="accept" hidden>
                                                    <input type="text" name="targetId" value="<?php print($user["idUser"]) ?>" hidden>
                                                    <input type="text" name="room_id" value="<?php print($currentHub->connectedUserRoom->roomId) ?>" hidden>
                                                    <button class="btn lh-buttons-purple">Accepter</button>
                                                </form>
                                                <form action="handlers/room-handler.php" method="POST" class="ms-2">
                                                    <input type="text" name="action" value="decline" hidden>
                                                    <input type="text" name="targetId" value="<?php print($user["idUser"]) ?>" hidden>
                                                    <input type="text" name="room_id" value="<?php print($currentHub->connectedUserRoom->roomId) ?>" hidden>
                                                    <button class="btn lh-buttons-red">X</button>
                                                </form>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                <!-- No request to join -->
                                <?php else: ?>
                                    <h2 class="text-center py-5">Les utilisateurs qui veulent rejoindre votre salon apparaîtrons ici.</h2>
                                <?php endif; ?>
                            </div>
                        <!-- Not a room owner -->
                        <?php else: ?>
                            <!-- Atleast 1 request pending -->
                            <?php if(count($currentHub->pendingRoomsList) > 0): ?>
                                <div class="row row-cols-1 row-cols-lg-4 g-3">

                                    <!-- Display All Rooms -->
                                    <?php foreach($currentHub->pendingRoomsList as $room): ?>
                                        <!-- Room -->
                                        <article class="col">
                                            <div class="card h-100">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <p class="fs-5 m-0 pe-2"><?php print(count($room->members)."/".$room->maxMembers) ?></p>
                                                        <i class="fa-solid fa-user fa-xl text-white"></i>
                                                    </div>

                                                    <?php print('<div class="px-2 fs-5 rounded bg-success">'.count($room->friendList).' amis</div>'); ?>

                                                    <div class="px-2 fs-5 rounded-5 game-tag-color"><?php print($room->gameTag) ?></div>
                                                </div>
                                                <div class="card-body">
                                                    <h2 class="card-title m-0 pb-1"><?php print($room->title) ?></h2>

                                                    <p class="card-subtitle fst-italic pb-2"><?php print("Créer par ".$room->owner."#".$room->ownerId) ?></p>

                                                    <p class="card-text"><?php print($room->description) ?></p>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between align-items-center">
                                                    <form action="handlers/room-handler.php" method="POST">
                                                        <input type="text" name="action" value="cancel" hidden>
                                                        <input type="text" name="room_id" value="<?php print($room->roomId) ?>" hidden>
                                                        <button type="submit" class="btn lh-buttons-purple-faded-to-red"></button>
                                                    </form>

                                                    <p class="m-0"><?php print($room->CreatedSince()); ?></p>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                </div>
                            <!-- No request pending -->
                            <?php else: ?>
                                <h2 class="text-center py-5">Les salons que vous essayez de rejoindre apparaîtrons ici.</h2>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                </div>

                <!-- Current hub tab content -->
                <?php if (!empty($currentHub->connectedUserRoom)): ?>
                    <div class="tab-pane fade show p-1 active border" id="current-hub-tab-pane" role="tabpanel" aria-labelledby="current-hub-tab" tabindex="0">
                        <div class="container-fluid p-0 d-flex">
                                
                            <!-- Chat -->
                            <div class="col d-flex flex-column" id="chat-window">
                                <!-- Room Options/Members -->
                                <button class="btn lh-buttons-purple rounded-2 px-2 mx-1 mx-md-2 mx-xl-3 my-2 d-flex justify-content-between align-items-center" id="chat-window-room-options">
                                    <span>#Salon: <?php print($currentHub->connectedUserRoom->title) ?></span>
                                    <img src="assets/images/pen-solid-20x20.png" alt="modifier le salon/voir les membres">
                                </button>

                                <!-- Chat log -->
                                <div class="container-fluid chat-window">
                                    <div class="row row-cols-1 px-1 px-md-2 px-xl-3">
                                        <!-- Disclaimer -->
                                        <article class="col disclaimer">
                                            <p>System : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, delectus.</p>
                                        </article>

                                        <!-- All Messages -->
                                        <article class="col message">
                                            <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h2 class="card-title">Random 1</h2>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, magni.</p>
                                            </div>

                                        </article>
                                        <article class="col message">
                                            <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h4 class="card-title">Random 2</h4>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">Contrary to popular belief, Chuck Norris, not the box jellyfish of northern Australia, is the most venomous creature on earth. CNN was originally created as the "Chuck Norris Network" to update Americans with on-the-spot ass kicking in real-time, Chuck Norris does not get frostbite. Chuck Norris bites frost, In Olde Tribal Celtic language, "Chuck" is the word for "Stone" and "Norris" is the word for "Henge", Chuck Norris is the reason why Waldo is hiding. Chuck Norris doesn't own a stove, water comes to a boil while he watches the pot filling, Chuck Norris doesn't wash his clothes, he disembowels them.

                                                Contrary to popular belief, America is not a democracy, it is a Chucktatorship, Chuck Norris does not get frostbite. Chuck Norris bites frost.
                                                    
                                                There is no theory of evolution. Just a list of creatures Chuck Norris has allowed to live Chuck Norris has two speeds. Walk, and Kill. Chuck Norris uses pepper spray to spice up his steaks, Chuck Norris originally appeared in the "Street Fighter II" video game, but was removed by Beta Testers because every button caused him to do a roundhouse kick. When asked bout this "glitch," Norris replied, "That's no glitch." Chuck Norris can eat a puffer fish whole Chuck Norris taught Yoda what the force was Chuck Norris played baseball once. He went 4 for 3 Chuck Norris uses pepper spray to spice up his steaks Chuck Norris once roundhouse kicked someone so hard that his foot broke the speed of light, went back in time, and killed Amelia Earhart while she was flying over the Pacific Ocean When the Boogeyman goes to sleep every night, he checks his closet for Chuck Norris. Chuck Norris can lead a horse to water AND make it drink The quickest way to a man's heart is with Chuck Norris' fist Chuck Norris' hand is the only hand that can beat a Royal Flush. Chuck Norris doesn't churn butter. He roundhouse kicks the cows and the butter comes straight out. When Chuck Norris does a pushup, he isn't lifting himself up, he's pushing the Earth down.
                                                    
                                                The government calls water boarding torture. Chuck calls it a facial. Chuck Norris originally appeared in the "Street Fighter II" video game, but was removed by Beta Testers because every button caused him to do a roundhouse kick. When asked bout this "glitch," Norris replied, "That's no glitch." Chuck Norris has a website, is called the internet. Chuck Norris can strangle you with his tongue, Contrary to popular belief, Chuck Norris, not the box jellyfish of northern Australia, is the most venomous creature on earth When Chuck Norris plays dodge ball...the balls dodge him Remember the Soviet Union? They decided to quit after watching a DeltaForce marathon on Satellite TV Contrary to popular belief, Chuck Norris, not the box jellyfish of northern Australia, is the most venomous creature on earth. The chief export of Chuck Norris is Pain Chuck Norris doesn't wear a watch. HE decides what time it is Chuck Norris drives an ice cream truck covered in human skulls Chuck Norris can make curtains out of the fabric of time When Chuck Norris sends in his taxes, he sends blank forms and includes only a picture of himself, crouched and ready to attack. Chuck Norris has not had to pay taxes, ever, Contrary to popular belief, America is not a democracy, it is a Chucktatorship.</p>
                                            </div>

                                        </article>
                                    </div>
                                </div>

                                <!-- User Message Input -->
                                <div class="input-group px-3 mb-2">
                                    <input type="text" class="input flex-grow-1" placeholder="Message">
                                    <button class="btn btn-dark border-purple hover-accent focus-accent"><img src="assets/images/paper-plane-solid.png" alt="send button"></button>
                                </div>
                            
                            </div>

                            <!-- Current Members -->
                            <section class="d-none flex-column bg-color-purple-faded border p-3" id="chat-members-window" aria-selected="false">

                                <!-- Section Title -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn-close" aria-label="Close" id="chat-members-close"></button>
                                    <h2 class="m-0">Membres</h2>
                                </div>
                                
                                <hr>

                                <!-- Room Lead -->
                                <div>
                                    <h4>Chef :</h4>
                                    <div>
                                        <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="avatar-50x50">
                                        <span class="ms-1"><?php print($currentHub->connectedUserRoom->owner) ?></span>
                                    </div>
                                </div>

                                <!-- Members -->
                                <div class="d-flex flex-column my-4 gap-3">
                                    <h4 class="mb-0">Equipe :</h4>

                                    <?php foreach($currentHub->connectedUserRoom->members as $member): ?>
                                        <?php if ($member["idUser"] !== $currentHub->connectedUserRoom->ownerId): ?>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="avatar-50x50">
                                                <span class="ms-1"><?php print($member["username"]) ?></span>
                                                <?php if($_SESSION["user"] === $currentHub->connectedUserRoom->ownerId): ?>
                                                    <form action="handlers/room-handler.php" method="POST" class="ms-auto">
                                                        <input type="text" name="action" value="promote" hidden>
                                                        <input type="text" name="targetId" value="<?php print($member["idUser"]) ?>" hidden>
                                                        <button class="btn hover-accent focus-accent px-1">
                                                            <img src="assets/images/crown-solid.png" alt="Promouvoir en tant que chef">
                                                        </button>
                                                    </form>
                                                    <form action="handlers/room-handler.php" method="POST">
                                                        <input type="text" name="action" value="kick" hidden>
                                                        <input type="text" name="targetId" value="<?php print($member["idUser"]) ?>" hidden>
                                                        <button class="btn hover-accent focus-accent px-1">
                                                            <img src="assets/images/user-minus-solid.png" alt="Renvoyer du salon">
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </div>

                                <!-- Modify/Leave Buttons -->
                                <div class="d-flex flex-column gap-3 mt-auto">
                                    <?php if ($_SESSION["user"] === $currentHub->connectedUserRoom->ownerId): ?>
                                        <button id="update-room" class="btn lh-buttons-purple">Modifier le salon</button>
                                    <?php endif; ?>
                                    <form action="handlers/room-handler.php" method="POST">
                                        <input type="text" name="action" value="leave" hidden>
                                        <input type="text" name="room_id" value="<?php print($currentHub->connectedUserRoom->roomId) ?>" hidden>
                                        <input type="text" name="membersCount" value="<?php print(count($currentHub->connectedUserRoom->members)) ?>" hidden>
                                        <input type="text" name="ownerId" value="<?php print($currentHub->connectedUserRoom->ownerId) ?>" hidden>
                                        <button class="btn lh-buttons-red w-100">Quitter le salon</button>
                                    </form>
                                </div>
                            </section>

                        </div>
                    </div>
                <?php endif ?>

                <!-- New Room hub tab content -->
                <?php if (!$currentHub->userIsOwner): ?>
                    <div class="tab-pane fade show p-1 border" id="new-room-hub-tab-pane" role="tabpanel" aria-labelledby="new-room-hub-tab" tabindex="0">

                        <div class="py-3">
                            <div class="row row-cols-1 px-3">

                                <div class="col">
                                    <h2 class="reconstruct mt-2">Création d'un salon</h2>
                                </div>
                                <div class="col px-2 px-md-5 px-lg-0 pb-4">
                                    <hr>
                                </div>

                                <!-- New Room Form -->
                                <form action="handlers/room-handler.php" method="POST" name="create_room" class="row py-lg-3">
                                
                                    <input type="text" name="action" value="create" hidden>

                                    <!-- Left Side -->
                                    <div class="col-lg-5 d-lg-flex flex-column">
                                        <div>
                                            <label for="game_new_room" class="mb-2">Jeu :</label>
                                            <select id="game_new_room" class="input mb-4 w-100" aria-label="Select" name="room_game" required aria-required="true">
                                                <option selected>Veuillez choisir un jeu</option>
                                                <?php foreach ($filters->filtersList as $gameId => $allGames): ?>
                                                    <?php foreach ($allGames as $game => $mode): ?>
                                                        <option value="<?php print($game) ?>" game_id="<?php print($gameId) ?>"><?php print($game) ?></option>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="game_type_new_room" class="mb-2">Type de partie :</label>
                                            <select id="game_type_new_room" class="input mb-4 w-100" aria-label="Select" name="room_game_type" required aria-required="true">
                                                <option selected>Veuillez choisir un type de partie</option>
                                            </select>
                                        </div>

                                        <input type="text" name="room_game_type_id" value="1" id="game_type_update_room_id" hidden>

                                        <div>
                                            <label for="player_number_new_room" class="mb-2">Nombre de participants :</label>
                                            <input type="number" name="room_number_player" id="player_number_new_room" min="1" max="10" value="5" class="input mb-4 w-100">
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="col-lg-5 offset-lg-2 d-lg-flex flex-column">
                                        <div>
                                            <label for="title_new_room" class="mb-2">Titre du salon :</label>
                                            <input type="text" name="room_title" id="title_new_room" maxlength="40" class="input mb-4 w-100" required aria-required="true">
                                        </div>

                                        <div>
                                            <label for="description" class="mb-2">Description :</label>
                                            <textarea name="description" id="description" maxlength="200" cols="10" rows="3" class="input mb-4 w-100"></textarea>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-lg-flex col-lg-5 offset-lg-7">
                                        <button class="btn w-100 lh-buttons-purple-faded mb-3 me-lg-4">Annuler</button>
                                        <button class="btn w-100 lh-buttons-purple mb-3">Créer un salon</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                <?php endif; ?>

                <!-- Update Room hub tab content -->
                <?php if ($currentHub->userIsOwner): ?>
                    <div class="tab-pane fade show p-1 border" id="update-room-hub-tab-pane" role="tabpanel" aria-labelledby="update-room-hub-tab" tabindex="0">

                        <div class="py-3">
                            <div class="row row-cols-1 px-3">

                                <div class="col">
                                    <h2 class="reconstruct mt-2">Modification d'un salon</h2>
                                </div>
                                <div class="col px-2 px-md-5 px-lg-0 pb-4">
                                    <hr>
                                </div>

                                <!-- Update Room Form -->
                                <form action="handlers/room-handler.php" method="POST" class="row py-lg-3" name="update_room">

                                    <input type="text" name="action" value="modify" id="update-action-field" hidden>

                                    <input type="text" name="room_id" value="<?php print($currentHub->connectedUserRoom->roomId) ?>" hidden>

                                    <!-- Left Side -->
                                    <div class="col-lg-5 d-lg-flex flex-column">
                                        <!-- Game Select -->
                                        <div>
                                            <label for="game_update_room" class="mb-2">Jeux :</label>
                                            <select id="game_update_room" class="input mb-4 w-100" aria-label="Select" name="room_game" required aria-required="true">
                                                <?php foreach ($filters->filtersList as $gameId => $allGames): ?>
                                                    <?php foreach ($allGames as $game => $mode): ?>
                                                        <option
                                                            value="<?php print($game) ?>"
                                                            game_id="<?php print($gameId) ?>"
                                                            <?php if ($currentHub->connectedUserRoom->gameId === $gameId) {print("selected");} ?>
                                                        >
                                                            <?php print($game) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <!-- Gamemode Select -->
                                        <div>
                                            <label for="game_type_update_room" class="mb-2">Type de partie :</label>
                                            <select id="game_type_update_room" class="input mb-4 w-100" aria-label="Select" name="room_game_type" required aria-required="true">
                                                <?php foreach ($filters->getGamemodesFromGameId($currentHub->connectedUserRoom->gameId) as $gamemodeId => $gamemodeName): ?>
                                                    <option
                                                        value="<?php print($gamemodeName) ?>"
                                                        gamemode_id="<?php print($gamemodeId) ?>"
                                                        <?php if ($currentHub->connectedUserRoom->gamemodeId === $gamemodeId) {print("selected"); $currentGamemodeId = $gamemodeId;} ?>
                                                    >
                                                        <?php print($gamemodeName) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <input type="text" name="room_game_type_id" value="<?php print($currentGamemodeId) ?>" id="game_type_update_room_id" hidden>

                                        <div>
                                            <label for="player_number_update_room" class="mb-2">Nombre de participants :</label>
                                            <input type="number" name="room_number_player" id="player_number_update_room" min="1" max="10" value="<?php print($currentHub->connectedUserRoom->maxMembers) ?>" class="input mb-4 w-100">
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="col-lg-5 offset-lg-2 d-lg-flex flex-column">
                                        <div>
                                            <label for="title_update_room" class="mb-2">Titre du salon :</label>
                                            <input type="text" name="room_title" id="title_update_room" maxlength="40" class="input mb-4 w-100" required aria-required="true" value="<?php print($currentHub->connectedUserRoom->title) ?>">
                                        </div>

                                        <div>
                                            <label for="description" class="mb-2">Description :</label>
                                            <textarea name="description" id="description" maxlength="200" cols="10" rows="3" class="input mb-4 w-100"><?php print($currentHub->connectedUserRoom->description) ?></textarea>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-lg-flex col-lg-5 offset-lg-2 order-lg-2 flex-lg-row-reverse">
                                        <button class="btn w-100 lh-buttons-purple mb-3">Modifier le salon</button>
                                        <button class="btn w-100 lh-buttons-purple-faded mb-4 mb-lg-3 me-lg-4">Annuler</button>
                                    </div>
                                    <div class="d-lg-flex col-lg-5 order-lg-1">
                                        <button class="btn w-100 lh-buttons-red mb-3" id="delete_room_button">Clôturer le salon</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                <?php endif ?>
                
            </div>

        </div>

    </main>

    <?php require_once(__DIR__."/../view/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/hub.js"></script>
</body>
</html>
