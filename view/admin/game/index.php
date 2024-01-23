<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

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

        <div class="d-flex bd-highlight justify-content-between">
            <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Jeux</h2>
            <div class="nav-dashboard-title px-lg-3 my-4 py-4">
                <form action="game_create.php" method="GET">
                    <button type="submit" id="newRoom" aria-controls="create-room-button" aria-selected="false" class="btn lh-buttons-purple text-end">Créer un jeu</button>
                </form>
            </div>
        </div>


        <table class="table">
            <thead class="">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody id="games">

            <?php
            foreach ($games as $game){
            ?>

            <tr class="">
                <td class=""><?php echo $game->getNameGame() ?></td>
                <td><?php echo $game->getDescriptionShort() ?></td>
                <td class="text-center">
                    <a href="game_edit.php?id=<?php echo $game->getIdGame() ?>" id="nav-update-game">
                        <img src="../assets/images/pen-solid-20x20.png" alt="modifier le jeu">
                    </a>

                    <a href="" id="nav-update-hub" data-id="<?php echo $game->getIdGame() ?>"
                       data-bs-toggle="modal" data-bs-target="#deleteGameModal">
                        <img class="icon-20x20 delete" src="../assets/images/trash-red.svg" alt="supprimer le salon/"
                             data-id="<?php echo $game->idGame ?>">
                    </a>

                </td>
            </tr>

            <?php
            }
            ?>
            </tbody>
        </table>

    </section>




</div>
<!-- Delete Hub Modal -->
<div class="modal fade" id="deleteGameModal"
     tabindex="-1" aria-labelledby="deleteGameModalLabel" aria-hidden="true">
    <form class="form" method="post" action="<?php echo($actionUrl) ?>" name="modal">
        <input type="text" name="action" value="delete" hidden>
        <input type="text" id="idgame"  name="idgame" hidden>
        <input type="text" id="type"  name="type" value="admin" hidden>

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-color-purple rounded-0">
                    <h5 class="modal-title fs-5" id="deleteGameModalLabel">
                        Supprimer </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce jeu ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn lh-buttons-red">Supprimer</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Le conteneur où le toast s'affichera -->
<div class="position-fixed  bottom-0 right-0 p-3 notif" style="z-index: 5">
    <div id="customToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">Avertissement </strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>

        </div>
        <div class="toast-body">
            <?php
            if (isset($_SESSION['errors'])) echo '<input id="errors" type="hidden" name="errors" value="1">';
            displayErrorsAndMessages(); ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>