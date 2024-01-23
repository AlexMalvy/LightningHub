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

</head>

<body>

<div class="navbar-brand my-lg-3 ps-lg-3 d-none d-lg-block">Tableau de bord</div>

<div class="d-lg-flex">

    <?php require_once base_path('view/admin/components/nav_admin.php'); ?>


    <section id="dashboard-hub" class="ms-lg-5 text-lg-start col-lg-10">

        <div class="d-flex bd-highlight justify-content-between bg-color-purple-faded">
            <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Modifier un salon</h2>
        </div>

                    <!-- Update Room Form -->
                    <form action="" class="row m-0 bg-color-purple-faded">
                        <input type="text" name="action" value="modify" id="update-action-field" hidden>
                        <input type="text" id="room_id"  name="room_id" value="<?php echo $_GET['id']; ?>" hidden>
                        <input type="text" id="type"  name="type" value="admin" hidden>
                        <!-- Left Side -->
                        <div class="col-lg-5 d-lg-flex flex-column">
                            <!-- Game Select -->
                            <div>
                                <label for="game_update_room" class="mb-2">Jeux :</label>
                                <select id="game_update_room" class="input mb-4 w-100" aria-label="Select" name="room_game" required aria-required="true">
                                    <option selected>Veuillez choisir un jeu</option>
                                    <option value="lol">League Of Legends</option>
                                </select>
                            </div>

                            <!-- Gamemode Select -->
                            <div>
                                <label for="game_type_update_room" class="mb-2">Type de partie :</label>
                                <select id="game_type_update_room" class="input mb-4 w-100" aria-label="Select" name="room_game_type" required aria-required="true">
                                    <option selected>Veuillez choisir un type de partie</option>
                                    <option value="normal">Normal</option>
                                    <option value="ranked">Ranked</option>
                                </select>
                            </div>

                            <div>
                                <label for="player_number_update_room" class="mb-2">Nombre de participants :</label>
                                <input value="<?php echo $hub->maxMembers ?>"
                                        type="number" name="room_number_player" id="player_number_update_room" min="1" max="10"
                                       class="input mb-4 w-100" required aria-required="true">
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="col-lg-5 offset-lg-2 d-lg-flex flex-column">
                            <div>
                                <label for="title_update_room" class="mb-2">Titre du salon :</label>
                                <input value="<?php echo $hub->title ?>"
                                        type="text" name="room_title" id="title_update_room" maxlength="40" class="input mb-4 w-100" required aria-required="true">
                            </div>

                            <div>
                                <label for="description" class="mb-2">Description :</label>
                                <textarea name="description" id="description" maxlength="100" cols="10" rows="3" class="input mb-4 w-100" required aria-required="true"
                                ><?php echo $hub->description ?>
                                </textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-lg-flex col-lg-5 offset-lg-7  flex-lg-row-reverse">
                            <button class="btn w-100 lh-buttons-purple mb-3">Modifier le salon</button>
                            <button class="btn w-100 lh-buttons-purple-faded mb-4 mb-lg-3 me-lg-4">Annuler</button>
                        </div>

                    </form>



    </section>




</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>