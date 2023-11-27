<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Hub</title>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require_once(__DIR__."/../view/header_nav.php") ?>

    <!-- Main -->
    <main class="mt-lg-5 pt-lg-5">

        <!-- Page Title -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 my-3">
            <h2 class="reconstruct">hub</h2>
        </div>

        <!-- Filters + Create Hub -->
        <div class="row mx-0 align-items-center">

            <!-- Filters -->
            <div class="col-lg-4 offset-lg-1 px-2 px-md-5 px-lg-0 mb-3">
                <!-- Toggle Button -->
                <button class="btn btn-hover bg-color-purple w-100 d-flex justify-content-between align-items-center py-3 fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFiltre" aria-controls="offcanvasFiltre">
                Filtres   
                <i class="fa-solid fa-plus fa-2xl"></i>
                </button>

                <!-- OffCanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFiltre" aria-labelledby="offcanvasFiltreLabel">

                    <!-- Header -->
                    <div class="offcanvas-header">
                        <h3 class="offcanvas-title" id="offcanvasFiltreLabel">Filtres</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="offcanvas-body">
                        <form action="" class="d-flex flex-column py-3">
                            <label for="game" class="pb-1">Jeu</label>
                            <select name="game" id="game" class="mb-3 p-1 rounded bg-white border text-black">
                                <option value="LoL">League Of Legends</option>
                                <option value="Valorant">Valorant</option>
                                <option value="WoW">World of Warcraft</option>
                                <option value="Warzone">Warzone</option>
                                <option value="Fifa">Fifa</option>
                            </select>

                            <label for="game_type" class="pb-1">Type de partie</label>
                            <select name="game_type" id="game_type" class="mb-3 p-1 rounded bg-white border text-black">
                                <option value="normal">Normal</option>
                                <option value="ranked">Ranked</option>
                                <option value="custom">Custom</option>
                            </select>

                            <label for="search" class="pb-1">Recherche</label>
                            <input type="search" name="search" id="search" class="mb-5 p-1 rounded bg-white border text-black">

                            <button type="submit" class="btn w-100 bg-color-purple rounded-5 mb-3 px-4 py-2 btn-hover fw-bold">Valider</button>

                            <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="btn w-100 bg-color-purple-faded rounded-5 mb-3 px-4 py-2 btn-hover fw-bold">Annuler</button>
                        </form>
                    </div>

                </div>

            </div>

            <!-- Create Hub -->
            <div class="col-lg-2 offset-lg-4 px-2 px-md-5 px-lg-0 mb-3 d-flex justify-content-lg-end">
                <a  id="newRoom" class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold">Créer un salon</a>
            </div>

        </div>

        <!-- Hub -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 mb-3 hub">

            <!-- Tabs -->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <!-- Hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white active" id="hub-tab" data-bs-toggle="tab" data-bs-target="#hub-tab-pane" type="button" role="tab" aria-controls="hub-tab-pane" aria-selected="true">Hub</button>
                </li>

                <!-- Friends tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends-tab-pane" type="button" role="tab" aria-controls="friends-tab-pane" aria-selected="false">Mes Amis</button>
                </li>

                <!-- Pending tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="false">En attente</button>
                </li>

                <!-- Current hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white" id="current-hub-tab" data-bs-toggle="tab" data-bs-target="#current-hub-tab-pane" type="button" role="tab" aria-controls="current-hub-tab-pane" aria-selected="false">"Salon 3"</button>
                </li>

                <!-- New Room hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white d-none" id="new-room-hub-tab" data-bs-toggle="tab" data-bs-target="#new-room-hub-tab-pane" type="button" role="tab" aria-controls="new-room-hub-tab-pane" aria-selected="false">Nouveau salon</button>
                </li>
            </ul>

            <!-- Content -->
            <div class="tab-content bg-color-purple-faded" id="myTabContent">

                <!-- Hub tab content -->
                <div class="tab-pane fade show active p-1 border" id="hub-tab-pane" role="tabpanel" aria-labelledby="hub-tab" tabindex="0">

                    <div class="container-fluid p-3">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3">

                            <!-- Room #1 -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">3/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded bg-success">2 amis</div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">[Gold]</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 1</p>
                                        <p class="card-text">Need top and supp.</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold">Rejoindre</button>
                                        <p class="m-0">3 min</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Room #2 (Pending demo) -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">2/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded bg-success">1 ami</div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">[Diamond]</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 2</p>
                                        <p class="card-text">LFG strong top</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple-faded rounded-5 px-4 py-2 fw-bold">
                                            En Attente
                                            <div class="spinner-border text-success spinner-border-sm ms-2" role="status">
                                              <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                        <p class="m-0">2 min</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Room #3 -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">4/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">[Bronze]</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 3</p>
                                        <p class="card-text">Let's have fun !!</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold">Rejoindre</button>
                                        <p class="m-0">7 min</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Room #4 -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">1/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">Title</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 4</p>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold">Rejoindre</button>
                                        <p class="m-0">>1 min</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Room #5 -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">3/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">Title</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 5</p>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold">Rejoindre</button>
                                        <p class="m-0">10 min</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Friends tab content -->
                <div class="tab-pane fade show p-1 border" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">

                    <div class="container py-3">
                        <div class="row row-cols-1 row-cols-lg-4 g-3">

                            <!-- Room #1 -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">3/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded bg-success">2 amis</div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">[Gold]</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 1</p>
                                        <p class="card-text">Need top and supp.</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold">Rejoindre</button>
                                        <p class="m-0">3 min</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Room #2 (Pending demo) -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">2/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded bg-success">1 ami</div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">[Diamond]</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 2</p>
                                        <p class="card-text">LFG strong top</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple-faded rounded-5 px-4 py-2 fw-bold">
                                            En Attente
                                            <div class="spinner-border text-success spinner-border-sm ms-2" role="status">
                                              <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                        <p class="m-0">2 min</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Pending tab content -->
                <div class="tab-pane fade show p-1 border" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">

                    <div class="container py-3">
                        <div class="row row-cols-1 row-cols-lg-4 g-3">

                            <!-- Room #2 (Pending demo) -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <p class="fs-5 m-0 pe-2">2/5</p>
                                            <i class="fa-solid fa-user fa-xl text-white"></i>
                                        </div>
                                        <div class="px-2 fs-5 rounded bg-success">1 ami</div>
                                        <div class="px-2 fs-5 rounded-5 game-tag-color">LoL</div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title m-0 pb-1">[Diamond]</h3>
                                        <p class="card-subtitle fst-italic pb-2">Créer par Random 2</p>
                                        <p class="card-text">LFG strong top</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-hover bg-color-purple-faded rounded-5 px-4 py-2 fw-bold">
                                            En Attente
                                            <div class="spinner-border text-success spinner-border-sm ms-2" role="status">
                                              <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                        <p class="m-0">2 min</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Current hub tab content -->
                <div class="tab-pane fade show p-1 border" id="current-hub-tab-pane" role="tabpanel" aria-labelledby="current-hub-tab" tabindex="0">

                    <div class="container py-3 chat-window position-relative">
                        <div class="row row-cols-1 px-3">
                            <div class="col disclaimer">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, delectus.</p>
                            </div>
                            <div class="col">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodity, delectus.</p>
                            </div>
                            <div class="col">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, delectus.</p>
                            </div>
                            <div class="col position-absolute bottom-0 start-0 mb-2">
                                <input type="text" class="w-100 p-1 rounded bg-white border text-black">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- New Room hub tab content -->
                <div class="tab-pane fade show p-1 border" id="new-room-hub-tab-pane" role="tabpanel" aria-labelledby="new-room-hub-tab" tabindex="0">

                    <div class="container py-3 create-window position-relative">
                        <div class="row row-cols-1 px-3">
                            <div class="col">
                                <h3 class="reconstruct mt-2">Création d'un salon</h3>
                            </div>
                            <div class="col px-2 px-md-5 px-lg-0 pb-4">
                                <hr>
                            </div>
                            <form action="" class="py-lg-3">
                                <div class="d-lg-flex">
                                    <div class="col-lg-5">
                                        <label for="games" class="mb-2">Jeux :</label>
                                        <select id="games" class="form-select mb-4 w-100 rounded bg-white text-black border-0 py-1 ps-2" aria-label="Select" name="games" required aria-required="true">
                                            <option selected>Veuillez Choisir un jeux</option>
                                            <option value="lol">League Of Legends</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 offset-lg-2">
                                        <label for="titleroom" class="mb-2">Titre du salon :</label>
                                        <input type="text" name="titleroom" id="titleroom" maxlength="40" class="mb-4 w-100 rounded bg-white text-black border-0 py-1 ps-2" required aria-required="true">
                                    </div>
                                </div>
                                <div class="d-lg-flex">
                                    <div class="col-lg-5">
                                        <label for="type" class="d-block mb-2">Type de partie :</label>
                                        <select id="type" class="form-select mb-4 w-100 rounded bg-white text-black border-0 py-1 ps-2" aria-label="Select" name="type" required aria-required="true">
                                            <option selected>Veuillez Choisir un type de partie</option>
                                            <option value="loisir">Loisir</option>
                                            <option value="competitif">Compétitif</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 offset-lg-2">
                                        <label for="description" class="d-block mb-2">Description :</label>
                                        <textarea name="description" id="description" maxlength="100" cols="10" rows="3" class="mb-4 w-100 rounded bg-white text-black border-0 pt-1 ps-2" required aria-required="true"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label for="numberofparticipants" class=" mb-2">Nombre de participants :</label>
                                    <input type="number" name="numberofparticipants" id="numberofparticipants" min="1" max="10" class="mb-4 w-100 rounded bg-white text-black border-0 py-1 ps-2" required aria-required="true">
                                </div>
                                <div class="d-lg-flex col-lg-5 offset-lg-7">
                                    <a href="#" class="btn w-100 bg-color-purple-faded rounded-5 mb-3 px-4 py-2 btn-hover fw-bold me-lg-4">Annuler</a>
                                    <a href="#" class="btn w-100 bg-color-purple rounded-5 mb-3 px-4 py-2 btn-hover fw-bold">Créer un salon</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                
            </div>

        </div>
        
        <?php  // require_once(__DIR__."/../view/footer.php") ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/scriptAccount.js"> </script>
</body>
</html>
