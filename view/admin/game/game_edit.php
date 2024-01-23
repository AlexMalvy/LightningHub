<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Home</title>
    <link rel="icon" type="image/png" href="../assets/images/logo-lightninghub.png">
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/admin/hub.js" defer></script>

</head>

<body>

<div class="navbar-brand my-lg-3 ps-lg-3 d-none d-lg-block">Tableau de bord</div>

<div class="d-lg-flex">

    <?php require_once base_path('view/admin/components/nav_admin.php'); ?>



    <section id="dashboard-hub" class="bg-color-purple-faded ms-lg-5 px-3 text-lg-start w-100">

        <div class="d-flex bd-highlight justify-content-between ">
            <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Modifier un jeu</h2>
        </div>

        <!-- Update Room Form -->
        <form method="POST" action="<?php echo $actionUrl ?>" class="row m-0 " enctype="multipart/form-data">
            <input type="text" name="action" value="update" id="update-action-field" hidden>
            <input type="text" id="idGame"  name="idGame" value="<?php echo $_GET['id']; ?>" hidden>
            <!-- Left Side -->
            <div class="col-lg-5 d-lg-flex flex-column">
                <div>
                    <label for="nameGame" class="mb-2">Titre :</label>
                    <input value="<?php echo $game->getNameGame() ?>"
                           name="nameGame" id="nameGame" maxlength="50"
                           class="input mb-4 w-100" required aria-required="true">
                </div>
                <div>
                    <label for="descriptionShort" class="mb-2">Description courte :</label>
                    <textarea name="descriptionShort" id="descriptionShort" maxlength="100" cols="10" rows="3" class="input mb-4 w-100"  aria-required="true"
                    ><?php echo $game->getDescriptionShort() ?></textarea>
                </div>
                <div>
                    <label for="twitch" class="mb-2">Twitch :</label>
                    <input value="<?php echo $game->getTwitch() ?>"
                           name="twitch" id="twitch" maxlength="255"
                           class="input mb-4 w-100" required aria-required="true">
                </div>
                <div>
                    <label for="reddit" class="mb-2">Reddit :</label>
                    <input value="<?php echo $game->getReddit() ?>"
                           name="reddit" id="reddit"  maxlength="255"
                           class="input mb-4 w-100" required aria-required="true">
                </div>
                <div>
                    <label for="officialWebsite" class="mb-2">Site web :</label>
                    <input value="<?php echo $game->getOfficialWebsite() ?>"
                           name="officialWebsite" id="officialWebsite" maxlength="255"
                           class="input mb-4 w-100" required aria-required="true">

                </div>
                <div>
                    <label for="gamemodes" class="mb-2">Entrez des nouveaux modes de jeu si vous le souhaitez :</label>
                    <input placeholder="Nouveaux modes (séparés d'une virgule)" name="gamemodes" id="gamemodes"  maxlength="255"
                           class="input mb-4 w-100">

                </div>




            </div>

            <!-- Right Side -->
            <div class="col-lg-5 offset-lg-2 d-lg-flex flex-column">

                <div>
                    <label for="tag" class="mb-2">Tag :</label>
                    <input value="<?php echo $game->getTag() ?>"
                           name="tag" id="tag"  maxlength="5"
                           class="input mb-4 w-100" required aria-required="true">
                </div>

                <div>
                    <label for="description" class="mb-2">Description longue :</label>
                    <textarea name="description" id="description" maxlength="2000" cols="10" rows="3" class="input mb-4 w-100"  aria-required="true"
                    ><?php echo $game->getDescription() ?></textarea>
                </div>

                <div>
                        <input type="text" name="image" value="image" hidden>
                        <img src="../<?php echo $game->getImage() ?>"
                             id="image" alt="game image"
                             class="input mb-4 w-100">
                        <label for="file" class="label-file me-2 p-2 text-center">Choisir une image</label>
                        <input id="file" type="file" name="file">


                </div>
            </div>

            <!-- Buttons -->
            <div class="d-lg-flex col-lg-5 offset-lg-7  flex-lg-row-reverse">
                <button class="btn w-100 lh-buttons-purple mb-3">Modifier le jeu</button>
                <a href="game.php" class="btn w-100 lh-buttons-purple-faded mb-4 mb-lg-3 me-lg-4">Annuler</a>
            </div>



        </form>
        <div class=" p-0 m-O  ">
        <div class="col-lg-6 justify-content-between">
            <?php
            if (isset($_SESSION['errors'])) echo '<input id="errors" type="hidden" name="errors" value="1">';

            ?>
            <label class="mb-2">Modes de jeu :</label>
            <div class="d-flex flex-row align-items-center flex-wrap">
                <?php
                foreach ($game->getAllGamesModes() as $mode) {
                    echo "<div class='card col-lg-3'>
                                  <div class='card-body'>
                                  <form method='POST' action='$actionUrl' class='m-0'>
                                           <input type='text' name='action' value='deleteGameMode' hidden>
                                        <input type='text'  name='idGameMode' value='".$mode['idGamemode']."' hidden>
                                        <input type='text'  name='idGame' value='".$_GET['id']."' hidden>

                                        <p>". $mode['nameGamemode'] ."</p>
                                      <button>X</button>
                                  </form>
                                  </div>

                                </div>";
                }
                ?>
            </div>


        </div>
</div>
    </section>

    <!-- Le conteneur où le toast s'affichera -->
    <div class="position-fixed bottom-0 right-0 p-3 " style="z-index: 5">
        <div id="customToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Avertissement </strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>

            </div>
            <div class="toast-body">
                <?php displayErrorsAndMessages(); ?>
            </div>
        </div>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>