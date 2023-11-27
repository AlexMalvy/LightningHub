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
                <i class="fa-solid fa-plus fa-2xl" style="color: #ffffff;"></i>
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
                    <button class="nav-link text-white" id="hub-tab" data-bs-toggle="tab" data-bs-target="#hub-tab-pane" type="button" role="tab" aria-controls="hub-tab-pane" aria-selected="false">Hub</button>
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
                    <button class="nav-link text-white active" id="current-hub-tab" data-bs-toggle="tab" data-bs-target="#current-hub-tab-pane" type="button" role="tab" aria-controls="current-hub-tab-pane" aria-selected="true">Chat</button>
                </li>

                <!-- New Room hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white d-none" id="new-room-hub-tab" data-bs-toggle="tab" data-bs-target="#new-room-hub-tab-pane" type="button" role="tab" aria-controls="new-room-hub-tab-pane" aria-selected="false">Nouveau salon</button>
                </li>
            </ul>

            <!-- Content -->
            <div class="tab-content bg-color-purple-faded" id="myTabContent">

                <!-- Hub tab content -->
                <div class="tab-pane fade show p-1 border" id="hub-tab-pane" role="tabpanel" aria-labelledby="hub-tab" tabindex="0">

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
                <div class="tab-pane fade show active p-1 border" id="current-hub-tab-pane" role="tabpanel" aria-labelledby="current-hub-tab" tabindex="0">
                    <div class="container-fluid p-0 d-flex">
                            
                        <!-- Chat -->
                        <div class="col d-flex flex-column" id="chat-window">
                            <!-- Room Options/Members -->
                            <button class="btn bg-color-purple btn-hover mx-1 mx-md-2 mx-xl-3 my-2 d-flex justify-content-between" id="chat-window-room-options">
                                <span>#Salon: Random Room</span>
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
                                        <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">

                                        <div class="message-body">

                                            <div class="message-header">
                                                <h3 class="card-title">Random 1</h3>
                                                <small>14:46</small>
                                                <img src="assets/images/triangle-exclamation-solid.svg" alt="report user" class="report">
                                            </div>

                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, magni.</p>
                                        </div>

                                    </article>
                                    <article class="col message">
                                        <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">

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
                                <input type="text" class="input rounded-start flex-grow-1" placeholder="Message">
                                <button class="btn btn-dark border-purple"><img src="assets/images/paper-plane-solid.png" alt="send button"></button>
                            </div>
                          
                        </div>

                        <!-- Current Members -->
                        <div class="d-none flex-column bg-color-purple-faded border p-3" id="chat-members-window" aria-selected="false">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn-close" aria-label="Close" id="chat-members-close"></button>
                                <h3 class="m-0">Membres</h3>
                            </div>
                            
                            <hr>

                            <div>
                                <h4>Chef :</h4>
                                <div>
                                    <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">
                                    <span>Room Lead</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column my-4 gap-3">
                                <h4 class="mb-0">Equipe :</h4>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">
                                    <span>Random 1</span>
                                    <img src="assets/images/crown-solid.png" alt="profile picture" class="ms-auto">
                                    <img src="assets/images/user-minus-solid.png" alt="profile picture">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">
                                    <span>Random 2</span>
                                    <img src="assets/images/crown-solid.png" alt="profile picture" class="ms-auto">
                                    <img src="assets/images/user-minus-solid.png" alt="profile picture">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">
                                    <span>Random 3</span>
                                    <img src="assets/images/crown-solid.png" alt="profile picture" class="ms-auto">
                                    <img src="assets/images/user-minus-solid.png" alt="profile picture">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="assets/images/the_last_of_us_profile_picture_500x500.png" alt="profile picture" class="profile-thumbnail">
                                    <span>Random 4</span>
                                    <img src="assets/images/crown-solid.png" alt="profile picture" class="ms-auto">
                                    <img src="assets/images/user-minus-solid.png" alt="profile picture">
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-3 mt-auto">
                                <button class="btn bg-color-purple btn-hover">Modifier le salon</button>
                                <button class="btn btn-danger">Quitter le salon</button>
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

        <div style="margin: 100px 0;"></div>
        
        <?php  // require_once(__DIR__."/../view/footer.php") ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/scriptAccount.js"> </script>
</body>
</html>
=======
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
                <button class="btn btn-hover bg-color-purple rounded-5 px-4 py-2 fw-bold" type="button" data-bs-toggle="tab"  data-bs-target="#new-room-hub-tab" aria-controls="new-room">Créer un salon</button>
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

                <!-- Update Room hub tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white d-none" id="update-room-hub-tab" data-bs-toggle="tab" data-bs-target="#update-room-hub-tab-pane" type="button" role="tab" aria-controls="update-room-hub-tab-pane" aria-selected="false">Modifier salon</button>
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

                    <div class="container position-relative">
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
                                    <input type="number" name="numberofparticipants" id="numberofparticipants" min="1" max="10" class="mb-3 w-100 rounded bg-white text-black border-0 py-1 ps-2" required aria-required="true">
                                </div>
                                <div class="d-lg-flex col-lg-5 offset-lg-7">
                                    <a href="#" class="btn w-100 bg-color-purple-faded rounded-5 mt-5 px-4 py-2 btn-hover fw-bold me-lg-4">Annuler</a>
                                    <a href="#" class="btn w-100 bg-color-purple rounded-5 mt-5 px-4 py-2 btn-hover fw-bold">Créer un salon</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

                <!-- Update Room hub tab content -->
                <div class="tab-pane fade show p-1 border" id="update-room-hub-tab-pane" role="tabpanel" aria-labelledby="update-room-hub-tab" tabindex="0">

                    <div class="container position-relative">
                        <div class="row row-cols-1 px-3">
                            <div class="col">
                                <h3 class="reconstruct mt-3">Modification du salon</h3>
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
                                    <input type="number" name="numberofparticipants" id="numberofparticipants" min="1" max="10" class="mb-3 w-100 rounded bg-white text-black border-0 py-1 ps-2" required aria-required="true">
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="#" class="btn w-100 btn-delete rounded-5 mt-5 px-4 py-2 btn-hover fw-bold me-lg-4 align-self-start">Clôturer le salon</a>
                                    </div>
                                    <div class="col-lg-3 offset-lg-3">
                                        <a href="#" class="btn w-100 bg-color-purple-faded rounded-5 mt-5 px-4 py-2 btn-hover fw-bold me-lg-4">Annuler</a>
                                        </div>
                                    <div class="col-lg-3">
                                        <a href="#" class="btn w-100 bg-color-purple rounded-5 mt-5 px-4 py-2 btn-hover fw-bold">Créer un salon</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                
            </div>

        </div>
        
        <?php  require_once(__DIR__."/../view/footer.php") ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
