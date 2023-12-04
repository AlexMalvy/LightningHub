<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Home</title>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php require_once(__DIR__."/../view/header_nav.php") ?>

<!-- Main -->
<main class="mt-lg-5 pt-lg-5">

    <!-- Introduction -->

            <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 my-3">
                <h2 class="reconstruct">Social</h2>

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
                    <a href="account.php" class="w-100 bd-highlight link-light text-decoration-none d-flex
                    align-items-center" >
                        <img id="" class="mx-2 avatar-50x50" src="assets/images/rick.jpg"  alt="connected user avatar-70x70">
                        <span id="myProfile">Ismael#42069</span>
                    </a>
                </p>
                <!-- Copy my id -->
                <a href="#" class="list-group-item col-3 text-end me-2 pe-3" onclick="copyId()">Copy <img class="icon-20x20"
                                                                                   src="assets/images/copy-regular.svg"  alt="copy icon"></a>


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
                        <!-- row-cols-1 row-cols-md-2 row-cols-lg -->
                        <!-- Disconnected Friends Switch -->
                        <div class="d-flex bd-highlight">
                            <div class="p-2 w-100 bd-highlight">Voir mes amis déconnectés</div>
                            <div class="form-check form-switch p-2 flex-shrink-1 bd-highlight ">
                                <label for="flexSwitchCheckDefault"></label><input class="form-check-input"
                                                                                   type="checkbox" id="flexSwitchCheckDefault" onclick="displayDisconnected()">
                            </div>
                        </div>

                        <!-- Friends List -->
                        <ul class="list-group list-group-flush p-0">


                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img
                                            class="me-2 avatar-50x50" src="assets/images/goku.png"
                                            alt="avatar player">Suamel1</a>

                                <!-- Send message button -->
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="offcanvas"
                                   data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><img
                                            class="icon-20x20" src="assets/images/message-solid-white.svg"
                                            alt="message icon"></a>

                                <!-- Delete friend button -->
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="modal"
                                   data-bs-target="#deleteFriendModal""><img class="icon-20x20"
                                                                             src="assets/images/user-minus-solid-white.svg"  alt="delete icon"></a>

                                <!-- Delete Friend Modal -->
                                <div class="modal fade" id="deleteFriendModal" tabindex="-1" aria-labelledby="deleteFriendModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-color-purple rounded-0">
                                                <h5 class="modal-title fs-5" id="deleteFriendModalLabel">Delete Friend</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this friend?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn lh-buttons-red">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Offcanvas of a conversation-->
                                <div class="offcanvas offcanvas-bottom h-75 col-lg-6 md-col-5"
                                     tabindex="-1"
                                     id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasBottomLabel">Suamel1</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body chat-window spaceBeforeInputChat">
                                        <!-- All Messages -->
                                        <article class="col message">
                                            <img src="assets/images/goku.png" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h3 class="card-title">Random 1</h3>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">Hé mec, tu étais en ligne hier soir ?</p>
                                            </div>

                                        </article>
                                        <article class="col message">
                                            <img src="assets/images/rick.jpg" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h4 class="card-title">Random 2</h4>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">
                                                    Ouais, j'étais là. On aurait dû faire une partie ensemble.
                                                </p>
                                            </div>

                                        </article>
                                        <article class="col message">
                                            <img src="assets/images/goku.png" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h3 class="card-title">Random 1</h3>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">Ah zut, j'ai fini par jouer à ce nouveau jeu
                                                    solo. C'était dingue, des graphismes de malade !</p>
                                            </div>

                                        </article>
                                        <article class="col message">
                                            <img src="assets/images/goku.png" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h3 class="card-title">Random 1</h3>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">Ah zut, j'ai fini par jouer à ce nouveau jeu
                                                    solo. C'était dingue, des graphismes de malade !</p>
                                            </div>

                                        </article>

                                        <article class="col message">
                                            <img src="assets/images/goku.png" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h3 class="card-title">Random 1</h3>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">Ah zut, j'ai fini par jouer à ce nouveau jeu
                                                    solo. C'était dingue, des graphismes de malade !</p>
                                            </div>

                                        </article>

                                        <article class="col message">
                                            <img src="assets/images/rick.jpg" alt="profile picture" class="avatar-50x50">

                                            <div class="message-body">

                                                <div class="message-header">
                                                    <h4 class="card-title">Random 2</h4>
                                                    <small>14:46</small>
                                                    <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                                </div>

                                                <p class="card-text">
                                                    Mais, vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous,
                                                    je dirais que c’est d’abord des rencontres, des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi.
                                                    Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée… Parce que quand on a le goût de la chose, quand on a le goût de
                                                    la chose bien faite, le beau geste, parfois, on ne trouve pas
                                                    l’interlocuteur en face, je dirais, le miroir qui vous aide à avancer. Alors ce n’est pas mon cas,
                                                    comme je le disais là, puisque moi au contraire, j’ai pu ; et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie… Je ne suis qu’amour !
                                                    Et finalement, quand beaucoup de gens aujourd’hui me disent : « Mais comment fais-tu pour avoir cette humanité ? » Eh bien je leur réponds très simplement,
                                                    je leur dis que c’est ce goût de l’amour, ce goût donc qui m’a poussé aujourd’hui à entreprendre une construction mécanique, mais demain, qui sait,
                                                    peut-être simplement à me mettre au service de la communauté, à faire le don, le don de soi…
                                                </p>
                                            </div>

                                        </article>



                                        <!-- Envoi de msg -->

                                        <form class="mt-3 position-absolute bottom-0 start-0 end-0 m-3">

                                            <div class="input-group inputChat">
                                                <input type="text" class="form-control bg-light text-dark input"
                                                       placeholder="Ecrivez votre message" id="messageInput">
                                                <div class="input-group-append">
                                                    <button class="btn btn-dark border-purple"><img src="assets/images/paper-plane-solid.png" alt="send button"></button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img
                                            class="me-2 avatar-50x50" src="assets/images/gon.jpg"
                                            alt="player avatar-70x70">Suamel</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="offcanvas"
                                   data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><img
                                            class="icon-20x20"
                                            src="assets/images/message-solid-white.svg" alt="message icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="modal"
                                   data-bs-target="#deleteFriendModal"><img class="icon-20x20"
                                                                            src="assets/images/user-minus-solid-white.svg" alt="delete icon"></a>


                            </li>

                        </ul>
                        <!-- List of disconnected friends -->
                        <ul class="list-group list-group-flush p-0 d-none"
                            id="list-disconnected">


                            <div class="flex-fill divider"></div> <!-- Divider between connected and disconnected
                            friends -->

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-secondary text-decoration-none"><img
                                            class="me-2 avatar-50x50" src="assets/images/goku.png"
                                            alt="player avatar-70x70">Disconnect 1</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/message-solid-white.svg"  alt="message icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="modal"
                                   data-bs-target="#deleteFriendModal"><img class="icon-20x20"
                                                                            src="assets/images/user-minus-solid-white.svg"  alt="delete icon"></a>

                            </li>

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-secondary text-decoration-none"><img
                                            class="me-2 avatar-50x50" src="assets/images/gon.jpg"
                                            alt="player avatar-70x70">Disc 2</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/message-solid-white.svg" alt="message icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="modal"
                                   data-bs-target="#deleteFriendModal"><img class="icon-20x20"
                                                                            src="assets/images/user-minus-solid-white.svg" alt="delete icon"></a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- LIST DEMANDS tab content -->
            <div class="tab-pane fade show border" id="demandes-tab-pane" role="tabpanel" aria-labelledby="demandes-tab" tabindex="0">

                <div class="container-fluid">
                    <div class="row ">
                        <!-- row-cols-1 row-cols-md-2 row-cols-lg -->
                        <!-- Disconnected Friends Switch -->

                        <ul class="list-group list-group-flush p-0">

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img
                                            class="me-2 avatar-50x50" src="assets/images/goku.png"
                                            alt="player avatar-70x70">Suamel1</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/check-solid-green.svg" alt="acceptance icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/xmark-solid-red.svg" alt="refusal icon"></a>

                            </li>

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img
                                            class="me-2 avatar-50x50" src="assets/images/gon.jpg"
                                            alt="player avatar-70x70">Suamel1</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/check-solid-green.svg" alt="acceptance icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/xmark-solid-red.svg" alt="refusal icon"></a>

                            </li>

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img
                                            class="me-2 avatar-50x50" src="assets/images/goku.png"
                                            alt="player avatar-70x70">Kilua</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/check-solid-green.svg" alt="acceptance icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/xmark-solid-red.svg" alt="refusal icon"></a>

                            </li>

                            <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                                <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img
                                            class="me-2 avatar-50x50" src="assets/images/gon.jpg"
                                            alt="player avatar-70x70">Kira</a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/check-solid-green.svg" alt="acceptance icon"></a>
                                <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img class="icon-20x20"
                                                                                        src="assets/images/xmark-solid-red.svg" alt="refusal icon"></a>

                            </li>
                        </ul>

                    </div>
                </div>

            </div>

            <!-- ADD FRIEND tab content -->
            <div class="tab-pane fade show p-1 border " id="add-tab-pane" role="tabpanel" aria-labelledby="add-tab"
                 tabindex="0">

                <div class="px-5 py-3 text-lg-start text-center g-lg-5 g-3">
                    <form method="POST" enctype="multipart/form-data" >

                    <label for="searchFriend" class="me-3"><img class="me-1 icon-20x20"
                                                             src="assets/images/user-plus-solid.svg"
                                     alt="add icon">Ajouter un ami</label>

                    <!--  <div class="card-body text-center bg-color-purple-faded"> -->
                    <input type="text" onkeyup="findUser()"  class=""
                           id="searchFriend"
                    aria-describedby="Rechercher un ami">

                    <button disabled type="submit" class="btn d-inline-flex
                    fw-bold text-center m-3 lh-buttons-purple" id="btnAddFriend" >Envoyer une demande
                    </button>
                    <p class="d-none" id="verificationUserGood">User found<img class="ms-2 icon-20x20"
                                                                   src="assets/images/check-solid.svg"
                                               alt="verification icon"></p>
                    <p class="d-none" id="verificationUserNotGood">User not found<img class="ms-2 icon-20x20"
                                                                               src="assets/images/xmark-solid-white.svg"
                                                                               alt="verification not good icon"></p>



                    </form>
                </div>
            </div>
        </div>


    </section>

</main>

<?php require_once(__DIR__."/../view/footer.php") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="assets/js/socials.js"> </script>
</body>

</html>