<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Lightning Hub - Mon compte</title>
</head>
<body>

    <?php require_once(__DIR__."/../view/header_nav.php") ?>

    <main>

        <!-- section infos account -->
        <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 mt-lg-5 pt-lg-5">
            <h2 class="reconstruct mb-5 mt-5">Mon compte</h2>

                <!-- Divider (Mobile) -->
                <div class="pb-4 d-lg-none">
                    <hr>
                </div>

            <!-- section profil picture -->
            <div class="row">
                <div class="container">
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple rounded-0">
                        Photo de profil
                    </div>
                    <div class="col-lg-7 py-4 ps-3 bg-color-purple-faded rounded-0 d-flex justify-content-between align-items-center">
                        <img src="assets/images/avatar.png" alt="photo de profil" class="avatar-70x70">

                        <!-- form picture -->
                        <form method="post" action="" enctype="multipart/form-data" class="me-2 d-flex align-items-center">
                            <label for="file" class="label-file me-2 p-2">Choisir une image</label>
                            <input id="file" class="d-none" type="file" name="avatarPicture">
                            <button class="btn lh-buttons-purple">Enregistrer</button>
                        </form>

                    </div>
                    <div class="col-lg-7 px-1 text-center bg-color-purple-faded rounded-0">
                        <p> l'image doit être au format JPEG, PNG ou GIF et ne doit pas dépasser 10 Mo.</p>
                    </div>
                </div>
            </div>

            <!-- section pseudo -->
            <div class="row">
                <div class="container">
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple rounded-0">
                        Pseudo
                    </div>
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple-faded rounded-0">

                        <!-- form pseudo -->
                        <form method="post" action="" class="d-flex justify-content-between align-items-center">
                            <input id="input-pseudo" class="input" type="text" placeholder="Fatality67" name="pseudo"/>
                            <button id ="btn-pseudo" aria-pressed="false" class="btn lh-buttons-purple me-2"><i class="fa-solid fa-pen text-white"></i></button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- section email -->
            <div class="row">
                <div class="container mt-3">
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple rounded-0">
                        Adresse email
                    </div>
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple-faded rounded-0">

                        <!-- form email -->
                        <form method="post" action="" class="d-flex justify-content-between align-items-center">
                            <input id="input-mail" class="input" type="email" placeholder="Fatality67@ccicampus.fr" name="email">
                            <button id ="btn-mail" aria-pressed="false" class="btn lh-buttons-purple me-2"><i class="fa-solid fa-pen text-white"></i></button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- section identifiants In-Game -->
            <div class="row">
                <div class="container mt-3">
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple rounded-0">
                        Identifiants IN GAME
                    </div>

                    <!-- section identifiant League of Legends -->
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple-faded rounded-0">
                       <div class="container ps-0">
                            <div class="row mb-4">
                                <div class="col-4 col-lg-5 align-self-center">
                                    Leagues of legends
                                </div>

                                <!-- form Leagues of legends -->
                                <form method="post" action="" class="col-8 col-lg-7 d-flex justify-content-between pe-0">
                                    <input class="input-inGame input" type="text" placeholder="RedMorgane" name="game[1]">
                                    <div>
                                        <button aria-pressed="false" class="button-inGame btn lh-buttons-purple ms-2 me-2">
                                        <i class="fa-solid fa-pen text-white"></i></button>
                                    </div>
                                </form>

                            </div>

                           <!-- section identifiant World of Warcraft -->
                            <div class="row mb-4">
                                <div class="col-4 col-lg-5 align-self-center">
                                    World of Warcraft
                                </div>

                                <!-- form World of Warcraft -->
                                <form method="post" action="" class="col-8 col-lg-7 d-flex justify-content-between pe-0">
                                    <input class="input-inGame input" type="text" placeholder="RedMorgane" name="game[2]">
                                    <div>
                                        <button aria-pressed="false" class="button-inGame btn lh-buttons-purple ms-2 me-2">
                                        <i class="fa-solid fa-pen text-white"></i></button>
                                    </div>
                                </form>
                            </div>

                           <!-- section identifiant Valorant -->
                            <div class="row mb-4">
                                <div class="col-4 col-lg-5 align-self-center">
                                    Valorant
                                </div>

                                <!-- form Valorant -->
                                <form method="post" action="" class="col-8 col-lg-7 d-flex justify-content-between pe-0">
                                    <input class="input-inGame input" type="text" placeholder="RedMorgane" name="game[3]">
                                    <div>
                                        <button aria-pressed="false" class="button-inGame btn lh-buttons-purple ms-2 me-2">
                                        <i class="fa-solid fa-pen text-white"></i></button>
                                    </div>
                                </form>
                            </div>

                           <!-- section identifiant Call of Duty : Warzone -->
                            <div class="row">
                                <div class="col-4 col-lg-5 align-self-center">
                                    Call of Duty : Warzone
                                </div>

                                <!-- form Call of Duty : Warzone -->
                                <form method="post" action="" class="col-8 col-lg-7 d-flex justify-content-between pe-0">
                                    <input class="input-inGame input" type="text" placeholder="RedMorgane" name="game[4]">
                                    <div>
                                        <button aria-pressed="false" class="button-inGame btn lh-buttons-purple ms-2 me-2">
                                        <i class="fa-solid fa-pen text-white"></i></button>
                                    </div>
                                </form>

                            </div>
                       </div>
                    </div>
                </div>
            </div>

            <!-- section notifications -->
            <div class="row">
                <div class="container mt-3">
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple rounded-0">
                        Centre de Notifications
                    </div>
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple-faded rounded-0 d-flex justify-content-between align-items-center">
                        <div>Notifications</div>

                        <!-- form notifications -->
                        <form method="post" action="" id="formNotification">
                            <div class="form-check form-switch form-check-reverse me-3">
                                <input class="form-check-input" type="checkbox" id="SwitchCheck" name="notificationCheckBox" aria-pressed="false"/>
                                 <!-- if ($valeur_checkbox == 'On') echo 'checked'; -->
                                <label class="form-check-label" for="SwitchCheck">On</label>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- section cookie and personal data -->
            <div class="row">

                <!-- section cookie -->
                <div class="container mt-3">
                    <div class="col-lg-7 py-3 ps-3 bg-color-purple rounded-0">
                        Cookies et données personnelles
                    </div>
                    <div class="col-lg-7 py-2 ps-3 bg-color-purple-faded rounded-0 d-flex flex-column align-items-start flex-lg-row justify-content-between align-items-lg-center">
                        <p class="m-0 ">Préférences cookies</p>
                        <a href="#" class="btn lh-buttons-purple my-2 mt-lg-0 me-2">Changer mes préférences</a>
                    </div>

                    <!-- section personal data -->
                    <div class="flex-fill divider d-lg-none"></div>
                    <div class="col-lg-7 py-2 ps-3 bg-color-purple-faded rounded-0 d-flex flex-column align-items-start flex-lg-row justify-content-between align-items-lg-center">
                        <p class="m-0">Télécharger vos données personnelles</p>
                        <a href="#" class="btn lh-buttons-purple my-2 mt-lg-0 me-2">Envoyer une demande</a>
                    </div>

                </div>
            </div>
        </section>

       <!-- section delete account -->
        <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 mt-5 pt-lg-5">
            <div class="row">
                <div class="container">
                    <div class="col-lg-7 py-3 rounded-0">
                        <div class="accordion" id="accordionDelete">
                            <div class="accordion-item rounded-0">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed bg-color-purple rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="Non" aria-controls="Reduire">
                                        Suppression du compte
                                    </button>
                                </h3>

                                <!-- button delete account -->
                                <div id="collapseOne" class="accordion-collapse collapse bg-color-purple-faded" data-bs-parent="#accordionDelete">
                                    <div class="accordion-body bg-color-purple-faded">
                                        <button class="btn lh-buttons-red" data-bs-toggle="modal" data-bs-target="#deleteAccountModal" >Supprimer mon compte</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </section>

        <?php include(__DIR__."/../view/modal_delete_confirmation.php") ?> 

    </main>

    <?php require_once(__DIR__."/../view/footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <script src="assets/js/scriptAccount.js"></script>
</body>
