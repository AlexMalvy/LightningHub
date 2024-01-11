<section id="dashboard-hub" class="ms-lg-5 text-lg-start d-none w-100">

    <div class="d-flex bd-highlight justify-content-between bg-color-purple-faded">
        <h2 class="p-2 bd-highlight">SALONS</h2>
        <div class="p-2 bd-highlight">
            <button id="newRoom" aria-controls="create-room-button" aria-selected="false" class="btn lh-buttons-purple text-end">Créer un salon</button>
        </div>
    </div>

            <table class="table bg-color-purple-faded ">
                <thead class="">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Joueurs max</th>
                    <th scope="col">Jeux</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="">
                <tr class="">
                    <td class="">Les Maîtres de la faille</td>
                    <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>
                    <td class="text-center">5</td>
                    <td>Lol</td>
                    <td class="text-center">
                        <a href="#" id="nav-update-hub">
                        Ico
                        <img  src="../assets/images/pen-solid-20x20.png" alt="modifier le salon/voir
                        les membres">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Les Maîtres de la faille</td>
                    <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>
                    <td class="text-center">5</td>
                    <td>Lol</td>
                    <td class="text-center">Ico X</td>
                </tr>
                <tr>
                    <td>Les Maîtres de la faille</td>
                    <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>
                    <td class="text-center">5</td>
                    <td>Lol</td>
                    <td class="text-center">Ico X</td>
                </tr>
                </tbody>
            </table>
        </section>

<section id="dashboard-create-hub" class="ms-lg-5 text-lg-start d-none w-100">
    <h2 class="p-2 bd-highlight">SALONS</h2>

    <div class="tab-pane fade show p-1 border bg-color-purple-faded" id="new-room-hub-tab-pane" role="tabpanel"
         aria-labelledby="new-room-hub-tab" tabindex="0">

        <div class="py-3">
            <div class="row-cols-1 px-3">

                <div class="col">
                    <h2 class="reconstruct mt-2">Création d'un salon</h2>
                </div>
                <div class="col px-2 px-md-5 px-lg-0 pb-4">
                    <hr>
                </div>

                <!-- New Room Form -->
                <form action="" class="row py-lg-3">

                    <!-- Left Side -->
                    <div class="col-lg-5 d-lg-flex flex-column">
                        <div>
                            <label for="game_new_room" class="mb-2">Jeux :</label>
                            <select id="game_new_room" class="input mb-4 w-100" aria-label="Select" name="room_game" required aria-required="true">
                                <option selected>Veuillez choisir un jeu</option>
                                <option value="lol">League Of Legends</option>
                            </select>
                        </div>

                        <div>
                            <label for="game_type_new_room" class="mb-2">Type de partie :</label>
                            <select id="game_type_new_room" class="input mb-4 w-100" aria-label="Select" name="room_game_type" required aria-required="true">
                                <option selected>Veuillez choisir un type de partie</option>
                                <option value="normal">Normal</option>
                                <option value="ranked">Ranked</option>
                            </select>
                        </div>

                        <div>
                            <label for="player_number_new_room" class="mb-2">Nombre de participants :</label>
                            <input type="number" name="room_number_player" id="player_number_new_room" min="1" max="10" class="input mb-4 w-100" required aria-required="true">
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
                            <textarea name="description" id="description" maxlength="100" cols="10" rows="3" class="input mb-4 w-100" required aria-required="true"></textarea>
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
</section>

<section id="dashboard-update-hub" class="ms-lg-5 text-lg-start d-none w-100">
    <h2 class="p-2 bd-highlight">SALONS</h2>

    <!-- Update Room hub tab content -->
    <div class="tab-pane fade show p-1 border bg-color-purple-faded" id="update-room-hub-tab-pane" role="tabpanel"
         aria-labelledby="update-room-hub-tab" tabindex="0">

        <div class="py-3">
            <div class=" row-cols-1 px-3">

                <div class="col">
                    <h2 class="reconstruct mt-2">Modification d'un salon</h2>
                </div>
                <div class="col px-2 px-md-5 px-lg-0 pb-4">
                    <hr>
                </div>

                <!-- Update Room Form -->
                <form action="" class="row py-lg-3">

                    <!-- Left Side -->
                    <div class="col-lg-5 d-lg-flex flex-column">
                        <div>
                            <label for="game_update_room" class="mb-2">Jeux :</label>
                            <select id="game_update_room" class="input mb-4 w-100" aria-label="Select" name="room_game" required aria-required="true">
                                <option selected>Veuillez choisir un jeu</option>
                                <option value="lol">League Of Legends</option>
                            </select>
                        </div>

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
                            <input type="number" name="room_number_player" id="player_number_update_room" min="1" max="10" class="input mb-4 w-100" required aria-required="true">
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-5 offset-lg-2 d-lg-flex flex-column">
                        <div>
                            <label for="title_update_room" class="mb-2">Titre du salon :</label>
                            <input type="text" name="room_title" id="title_update_room" maxlength="40" class="input mb-4 w-100" required aria-required="true">
                        </div>

                        <div>
                            <label for="description" class="mb-2">Description :</label>
                            <textarea name="description" id="description" maxlength="100" cols="10" rows="3" class="input mb-4 w-100" required aria-required="true"></textarea>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-lg-flex col-lg-5 offset-lg-2 order-lg-2 flex-lg-row-reverse">
                        <button class="btn w-100 lh-buttons-purple mb-3">Modifier le salon</button>
                        <button class="btn w-100 lh-buttons-purple-faded mb-4 mb-lg-3 me-lg-4">Annuler</button>
                    </div>
                    <div class="d-lg-flex col-lg-5 order-lg-1">
                        <button class="btn w-100 lh-buttons-red mb-3">Clôturer le salon</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>


