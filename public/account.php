<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/logo-lightninghub.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Lightning Hub - Mon compte</title>
</head>
<body>
    
    <?php 
    require_once(__DIR__."/../bootstrap/app.php");
    require_once(__DIR__."/../view/header_nav.php");

    $userController = new App\Controllers\UserController();
    $users = $userController->index($_SESSION['user']);

    $idInGameUsername = new \App\Controllers\PlayGamesController($_SESSION['user']);
    $games = new App\Models\Games();
    ?>

    <main class="account-fields px-2 px-md-5 px-lg-0 mt-lg-5 pt-lg-5 col-lg-10 offset-lg-1">
        <h1>Mon compte</h1>

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg-color-purple rounded-0">
                            <h3 class="modal-title fs-5"><?=$_SESSION['message']?></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php unset($_SESSION['message']);
            unset($_SESSION['type']);
            ?>
        <?php endif; ?>


        <!-- Divider (Mobile) -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-4 d-lg-none">
            <hr>
        </div>

        <div class="limit-width">
            <?php foreach($users as $user): ?>
            <!-- Picture Profil -->

            <section id="profile-picture">
                <h2 class="py-3 ps-3 bg-color-purple rounded-0">Photo de profil</h2>
                <form action="handlers/User-handler.php"  method="POST" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center">
                    <input type="text" name="action" value="picture" hidden>
                    <img src="<?php echo $user->getProfilePicture()?>" alt="photo de profil" class="avatar-70x70">
                    <label for="file" class="label-file me-2 p-2 text-center">Choisir une image</label>
                    <input id="file" type="file" name="avatarPicture">
                    <button class="btn lh-buttons-purple">Enregistrer</button>
                </form>
                <p class="text-center px-1 py-0">l'image doit être au format JPEG, PNG ou GIF et ne doit pas dépasser 2 Mo.</p>
            </section>

            <!-- Pseudo -->

          <section id="pseudo">
            <h2 class="py-3 ps-3 bg-color-purple rounded-0">Pseudo</h2>
                <form action = "handlers/User-handler.php?idUser=<?php echo $user->getId(); ?>" method = "POST"  class="d-flex justify-content-between align-items-center">
                    <input id="input-pseudo" maxlength= 25 class="input" type="text" value="<?php echo $user->getUserName(); ?>" name="pseudo"/>
                    <input type="text" name="action" value="updateusername" hidden>
                    <button id ="btn-pseudo" aria-pressed="false" class="btn lh-buttons-purple me-2 "><i class="fa-solid fa-pen text-white"></i></button>
                </form>
            </section>
      
            <!-- email -->

            <section id="email">
            <h2 class="py-3 ps-3 bg-color-purple rounded-0">Adresse email</h2>
                <form action = "handlers/User-handler.php?idUser=<?php echo $user->getId(); ?>" method = "POST"  class="d-flex justify-content-between align-items-center">
                    <input type="text" name="action" value="updatemail" hidden>
                    <input id="input-mail" maxlength= 40 class="input" type="email" value="<?php echo $user->getEmail(); ?>" name="email">
                    <button id ="btn-mail" aria-pressed="false" class="btn lh-buttons-purple me-2"><i class="fa-solid fa-pen text-white"></i></button>
                </form>
            </section>


            <!-- Identifiants INGAME -->
            <section id="identifiants">
                <h2 class="py-3 ps-3 bg-color-purple rounded-0">Identifiants IN GAME</h2>

                    <?php foreach($games->allGamesList as $game):?>
                        <?php $userFound = false; ?>
                        <?php foreach($idInGameUsername->getInGameUsername() as $inGameUser):?>
                            <?php if($game['idGame'] === $inGameUser['idGame']): ?>
                                <?php $userFound = true; ?>
                                <form action="handlers/User-handler.php?idUser=<?php echo $inGameUser['idUser']?>&idGame=<?php echo $game['idGame'] ?>" method="POST" class="col-md-7 d-flex justify-content-between">
                                    <input type="text" name="action" value="idGameUpdate" hidden>
                                    <label><?php echo $game['nameGame'] ?></label>
                                    <input class="input-inGame input" maxlength=25 type="text" value="<?php echo $inGameUser['inGameUsername']?>" name="inGameUsername">
                                    <div>
                                        <button aria-pressed="false" class="button-inGame btn lh-buttons-purple me-2">
                                            <i class="fa-solid fa-pen text-white"></i>
                                        </button>
                                    </div>
                                </form>
                            <?php endif;?>
                        <?php endforeach; ?>

                        <?php if(!$userFound): ?>
                            <form action="handlers/User-handler.php?idUser=<?php echo $user->getId()?>&idGame=<?php echo $game['idGame'] ?>" method="POST" class="col-md-7 d-flex justify-content-between">
                                <input type="text" name="action" value="idGameInsert" hidden>
                                <label><?php echo $game['nameGame'] ?></label>
                                <input class="input-inGame input" maxlength= 25 type="text" value="" name="inGameUsername">
                                <div>
                                    <button aria-pressed="false" class="button-inGame btn lh-buttons-purple me-2">
                                        <i class="fa-solid fa-pen text-white"></i>
                                    </button>
                                </div>
                            </form>
                        <?php endif;?>

                    <?php endforeach; ?>
            </section>

            <!-- Notifications -->

            <section id="notification-center">
                <h2 class="py-3 ps-3 bg-color-purple rounded-0">Centre de Notifications</h2>
                <form action="handlers/User-handler.php?idUser=<?php echo $user->getId(); ?>" method="POST"  id="formNotification" class="d-flex align-items-center justify-content-between">
                    <input type="text" name="action" value="update_notification" hidden>
                    <label>Notifications</label>
                    <div class="form-check form-switch form-check-reverse me-3">
                        <input class="form-check-input" type="checkbox" id="SwitchCheck" name="notification" aria-pressed="false" <?php echo !$user->getNotificationEnabled() ? '' : 'checked'; ?>>
                        <label class="form-check-label" for="SwitchCheck">On</label>
                    </div>
                </form>
            </section>
            <?php endforeach; ?>
            <!-- Cookies -->


            <section id="cookies">
                <h2 class="py-3 ps-3 bg-color-purple rounded-0">Cookies et données personnelles</h2>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="label">Préférences cookies</span>
                        <a href="#" class="btn lh-buttons-purple my-2 mt-lg-0 me-2">Changer mes préférences</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="label">Télécharger vos données personnelles</span>
                        <a href="#" class="btn lh-buttons-purple my-2 mt-lg-0 me-2" data-bs-toggle="modal" data-bs-target="#personaldata">Envoyer une demande</a>
                    </div>
            </section>

       <!-- section delete account -->
        <section id="delete-account">
            <div class="accordion-total col-lg-7 p-0 rounded-0">
                <div class="accordion" id="accordionDelete">
                    <div class="accordion-item rounded-0">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed bg-color-purple rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="Non" aria-controls="Reduire">
                                Suppression du compte
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse bg-color-purple-faded" data-bs-parent="#accordionDelete">
                            <div class="accordion-body bg-color-purple-faded">
                                <button class="btn lh-buttons-red" data-bs-toggle="modal" data-bs-target="#deleteAccountModal" >Supprimer mon compte</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include(__DIR__."/../view/modal_delete_confirmation.php") ?> 
        <?php include(__DIR__."/../view/modal_personal_data.php") ?>
    </div>
    </main>

    <?php require_once(__DIR__."/../view/footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <script src="assets/js/Account.js"></script>
</body>
