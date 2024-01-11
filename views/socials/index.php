<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Home</title>
    <link rel="icon" type="image/png" href="assets/images/logo-lightninghub.png">
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php require_once base_path('views/header_nav.php'); ?>
<?php displayErrorsAndMessages(); ?>
<?php //require_once(__DIR__ . "/../views/header_nav.php");
//require_once(__DIR__."/../controller/SocialsController.php");

//var_dump($_SESSION);
?>

<!-- Main -->
<input name="friends" value="<?php echo ($friendsNames)?>" hidden id="friends">
<main class="mt-lg-5 pt-lg-5">

    <!-- Introduction -->

    <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 my-3">
        <h1>Social</h1>

        <!-- Divider (Mobile) -->
        <hr class="d-lg-none">
    </section>
    <!-- SECTION My profile -->

    <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-1 py-2 py-lg-0 my-3">
        <div class="card bg-color-purple-faded col-lg-6 offset-lg-6">
            <div class="row g-0 text-center align-items-center justify-content-between">
                <div class="card-header col-3 bg-color-purple d-none d-lg-block p-3">
                    Ton id :
                </div>

                <p class="list-group-item col-4 m-0">
                    <a href="account.php" class="w-100 bd-highlight link-light text-decoration-none d-flex align-items-center">
                        <img id="" class="mx-2 avatar-50x50" src="/assets/images/<?php echo
                         $current_user['profilePicture'] ?>"  alt="connected user avatar-70x70">
                        <span id="myProfile"><?php echo $current_user['username'] . "#" .
                             $current_user['idUser'];?></span>
                    </a>
                </p>
                <!-- Copy my id -->
                <a href="#" class="list-group-item col-3 text-end me-2 pe-3" onclick="copyId()">Copier
                    <img class="icon-20x20" src="assets/images/copy-regular.svg"  alt="copy icon">
                </a>

            </div>
        </div>
    </section>



    <!-- SECTION Tabs -->
    <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-1 hub">

        <!-- Tabs -->
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <!-- Friends tab head -->
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white active" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends-tab-pane" type="button" role="tab" aria-controls="friends-tab-pane" aria-selected="true">Mes amis</button>
            </li>

            <!-- Friend request list tab head -->
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white " id="demandes-tab" data-bs-toggle="tab" data-bs-target="#demandes-tab-pane" type="button" role="tab" aria-controls="demandes-tab-pane" aria-selected="false">Demandes d'ajout</button>
            </li>

            <!-- Add friend tab head -->
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white" id="add-tab" data-bs-toggle="tab" data-bs-target="#add-tab-pane" type="button" role="tab" aria-controls="add-tab-pane" aria-selected="false">Ajouter</button>
            </li>


        </ul>

        <!-- Content -->
        <div class="tab-content bg-color-purple-faded" id="myTabContent">

            <!-- FRIENDS tab content -->
            <div class="tab-pane fade show active border" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">

                <div class="container-fluid">
                    <div class="row">
                        <!-- Disconnected Friends Switch -->
                        <div class="d-flex bd-highlight">
                            <div class="p-2 w-100 bd-highlight">Voir mes amis déconnectés</div>
                            <div class="form-check form-switch p-2 flex-shrink-1 bd-highlight ">
                                <label for="flexSwitchCheckDefault"></label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="displayDisconnected()">
                            </div>
                        </div>

                        <!-- Friends List -->
                        <ul class="list-group list-group-flush p-0">

                            <!--                            TEST BDD-->
                            <?php
                             foreach ($friends_connected as $friend_connected) {?>
                                <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none ">
                                        <img class="me-2 avatar-50x50" src="assets/images/<?php echo
                                        $friend_connected['profilePicture']?>" alt="player
                                        avatar-70x70"><?php echo $friend_connected['username']?></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                                       data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?php echo $friend_connected['idUser']?>" aria-controls="offcanvasBottom">
                                        <img class="icon-20x20" src="assets/images/message-solid-white.svg"
                                             alt="message icon"></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                                       data-bs-toggle="modal" data-bs-target="#deleteFriendModal<?php echo $friend_connected['idUser']?>">
                                        <img class="icon-20x20" src="assets/images/user-minus-solid-white.svg"
                                             alt="delete icon"></a>


                                </li>



                             <?php } ?>


                            <!--                          FIN  TEST BDD-->

                                <?php

                                foreach ($friends as $friend){?>
                                     <!-- Offcanvas of a conversation-->
                                <div class="offcanvas offcanvas-bottom h-75 col-lg-6 md-col-5" tabindex="-1" id="offcanvasBottom<?php echo($friend['idUser'])?>" aria-labelledby="offcanvasBottomLabel">
                                    <header class="offcanvas-header bg-color-purple">
                                        <h5 id="offcanvasBottomLabel"><?php echo($friend['username'])?></h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </header>


                                    <div class="offcanvas-body chat-window space-before-input-chat flex-column-reverse">
                                        <!-- All Messages -->

                                        <?php
                                        foreach ($myMsgs as $msg) {
                                            if ($msg['idUser2'] == $friend['idUser'] OR $msg['idUser1'] == $friend['idUser'] AND $msg['idUser2'] == $current_user['idUser']) {
                                            ?>

                                                <article class="col message">
                                                    <img src="assets/images/<?php echo($msg['profilePicture'])?>" alt="profile picture" class="avatar-50x50">

                                                    <div class="message-body">

                                                        <div class="message-header">
                                                            <h3 class="card-title"><?php echo($msg['username'])?></h3>
                                                            <small><?php echo($msg['timeMessage'])?></small>
                                                            <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                        </div>

                                                        <p class="card-text"><?php echo($msg['message'])?></p>
                                                    </div>

                                                </article>
                                               <?php }
                                        }
                                        ?>
                                        <!-- User message input -->

                                        <form class="mt-3 position-absolute bottom-0 start-0 end-0 m-3" method="POST"
                                              action="<?php echo($actionUrlMsg) ?>?idUser1=<?php echo($current_user['idUser']) ?>&idUser2=<?php echo($friend['idUser']) ?>" >
                                            <input type="text" name="action" value="store" hidden>

                                            <div class="input-group inputChat">
                                                <input type="text" class="form-control bg-light text-dark input"
                                                       placeholder="Ecrivez votre message" id="message" name="message">
                                                <div class="input-group-append">
                                                    <button class="btn btn-dark border-purple hover-accent focus-accent">
                                                        <img src="assets/images/paper-plane-solid.png" alt="send button">
                                                    </button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>

                                    <!-- Delete Friend Modal -->
                                    <div class="modal fade" id="deleteFriendModal<?php echo $friend['idUser']?>"
                                         tabindex="-1" aria-labelledby="deleteFriendModalLabel" aria-hidden="true">
                                        <form method="post" action="<?php echo($actionUrlSoc) ?>">
                                            <input type="text" name="action" value="delete" hidden>
                                            <input type="text" name="id" value="<?php echo($friend['idUser']) ?>" hidden>

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-color-purple rounded-0">
                                                        <h5 class="modal-title fs-5" id="deleteFriendModalLabel">Supprimer <?php echo $friend['username']?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir supprimer cet ami ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn lh-buttons-red">Supprimer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                           <?php
                                }

                                ?>




                        </ul>
                        <!-- List of disconnected friends -->


                        <!--                        TEST BDD -->
                        <?php
                            if ($friends_connected && $friends_disconnected){
                                ?>
                                <div class="flex-fill divider"></div> <!-- Divider between connected and disconnected
                            friends -->
                        <?php
                            }
                        ?>
                        <ul class="list-group list-group-flush p-0 d-none"
                            id="list-disconnected">



                            <?php

                            foreach ($friends_disconnected as $friend_disconnected){?>

                                <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                    <a href="#" class="p-2 w-100 bd-highlight link-secondary text-decoration-none">
                                        <img class="me-2 avatar-50x50" src="assets/images/<?php echo
                                        $friend_disconnected['profilePicture']?>"
                                             alt="player
                                        avatar-70x70"><?php echo $friend_disconnected['username']?></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                                       data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom<?php echo
                                    $friend_disconnected['idUser']?>" aria-controls="offcanvasBottom">
                                        <img class="icon-20x20" src="assets/images/message-solid-white.svg"
                                             alt="message icon"></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                                       data-bs-toggle="modal" data-bs-target="#deleteFriendModal<?php echo $friend_disconnected['idUser']?>">
                                        <img class="icon-20x20" src="assets/images/user-minus-solid-white.svg" alt="delete icon"></a>

                                </li>
                                <?php
                            }?>


                        </ul>
                    </div>
                </div>
            </div>


            <!-- LIST DEMANDS tab content -->
            <div class="tab-pane fade show border" id="demandes-tab-pane" role="tabpanel" aria-labelledby="demandes-tab" tabindex="0">

                <div class="container-fluid p-0">

                    <ul class="list-group list-group-flush p-0">

                        <?php

                        foreach ($requests as $request) { ?>
                            <form method="POST" action="<?php echo($actionUrlSoc) ?>">


                                <input type="text" name="id" value="<?php echo($request['idUser']) ?>" hidden>

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none">
                                    <img class="me-2 avatar-50x50" src="assets/images/<?php echo
                                    $request['profilePicture']?>" alt="player avatar-70x70"><?php echo
                                    $request['username']?></a>
                                <button type="submit" name="action" value="update" class="p-2 flex-shrink-1 bd-highlight bg-color-purple-faded">
                                    <img class="icon-20x20" src="assets/images/check-solid-green.svg" alt="acceptance icon"></button>
                                <button type="submit" name="action" value="delete" class="p-2 flex-shrink-1 bd-highlight bg-color-purple-faded">
                                    <img class="icon-20x20" src="assets/images/xmark-solid-red.svg" alt="refusal icon"></button>



                            </li>
                            </form>
                        <?php } ?>


                    </ul>

                </div>

            </div>

            <!-- ADD FRIEND tab content -->
            <div class="tab-pane fade show p-1 border " id="add-tab-pane" role="tabpanel" aria-labelledby="add-tab"
                 tabindex="0">

                <div class="px-5 py-3 text-lg-start text-center g-lg-5 g-3">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo($actionUrlSoc) ?>">
                        <input type="text" name="action" value="store" hidden>
                        <label for="searchFriend" class="me-3">
                            <img class="me-1 icon-20x20" src="assets/images/user-plus-solid.svg" alt="add icon">Ajouter un ami</label>

                        <input type="text" onkeyup="findUser()" class="input" id="searchFriend" name="searchFriend" aria-describedby="Rechercher un ami">

                        <button disabled type="submit" class="btn d-inline-flex fw-bold text-center m-3 lh-buttons-purple" id="btnAddFriend" >Envoyer une demande
                        </button>
                        <p class="d-none" id="verificationUserGood">Utilisateur trouvé
                            <img class="ms-2 icon-20x20" src="assets/images/check-solid.svg" alt="verification icon">
                        </p>
                        <p class="d-none" id="verificationUserNotGood">Utilisateur non trouvé
                            <img class="ms-2 icon-20x20" src="assets/images/xmark-solid-white.svg" alt="verification not good icon">
                        </p>

                    </form>
                </div>
            </div>
        </div>


    </section>

</main>

<?php // require_once(__DIR__ . "/../views/footer.php") ?>
<?php require_once base_path('views/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="assets/js/socials.js"> </script>
</body>

</html>