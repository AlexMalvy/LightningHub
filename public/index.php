<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
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
    <?php

    use App\Models\Games;

    require_once(__DIR__."/../bootstrap/app.php");

    $games = new Games();
    ?>
    <?php require_once(__DIR__."/../view/header_nav.php") ?>



    <!-- Main -->
    <main>

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


        <!-- Introduction -->
        <section>
            <div class="container-fluid d-flex align-items-center first-background-img px-0 first-section">
                <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 py-5">
                    <h2 class="reconstruct hero-size-title">Entre Dans Le Game</h2>
                    <p class="py-2 d-none d-lg-block hero-size">Trouvez facilement des partenaires de jeu partageant vos intérêts, que ce soit pour des sessions compétitives ou simplement pour le fun.</p>
                    <p class="mb-4 hero-size">
                        Rejoins-nous pour vivre des expériences <strong>gaming inoubliables.</strong>
                    </p>
                    <div class="d-flex flex-column flex-lg-row">
                        <a href="hub.php" class="btn lh-buttons-purple mt-3 mt-lg-0 d-flex align-items-center">
                            <img src="assets/images/hub-icon-37x37.png" alt="trouver-une-team">
                            <span class="ps-2">Trouver une Team</span>
                        </a>
                        <a href="login.php" class="btn lh-buttons-purple ms-lg-5 mt-5 mt-lg-0 d-flex align-items-center">
                            <img src="assets/images/pen-to-square-regular.svg" alt="créer-un-compte">
                            <span class="ps-2 mx-auto">Créer un compte</span>
                        </a>
                    </div>
                </div>
            </div>
            <p class="col-lg-10 offset-lg-1 px-2 px-md-5 d-lg-none py-4">Trouvez facilement des partenaires de jeu partageant vos intérêts, que ce soit pour des sessions compétitives ou simplement pour le fun.</p>
        </section>

        <!-- First Divider (Mobile) -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-4 d-lg-none">
            <hr>
        </div>

        <!-- Games Carousel (Mobile) -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-1 d-lg-none">
            <div id="carouselExampleCaptions" class="carousel slide bg-color-purple-faded">

                <!-- Carousel Title + Arrow -->
                <div class="d-flex justify-content-between align-items-center ps-3 pt-2">
                    <h2 class="m-0 reconstruct">Nos Univers</h2>
                    <!-- Carousel Left/Right Arrow -->
                    <div>
                        <button class="btn px-1 focus-accent" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"><img src="assets/images/carousel-left-arrow-37x37.png" alt="previous slide"></button>
                        <button class="btn px-1 focus-accent" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"><img src="assets/images/carousel-right-arrow-37x37.png" alt="next slide"></button>
                    </div>
                </div>

                <!-- Carousel content -->
                <div class="carousel-inner">

                    <!-- Display Games -->
                    <?php
                    $counter = 0;
                    foreach($games->getOnlyXGames(4) as $game): ?>

                    <!-- Game Card -->
                    <div class="carousel-item <?php if ($counter === 0) print("active"); ?>">
                        <section class="card bg-transparent border-0 m-2 px-2">
                            <img src="<?php print($game["image"]) ?>" class="card-img-top" alt="images-<?php print($game["nameGame"]) ?>">
                            <div class="card-body px-0">
                                <h3 class="card-title"><?php print($game["nameGame"]) ?></h3>
                                <p class="card-text"><?php print($game["description"]) ?></p>
                                <div class="d-flex justify-content-between">

                                    <!-- Join Team -->
                                    <a href="hub.php?game=<?php print(str_replace(" ", "+",$game["nameGame"])) ?>" class="btn lh-buttons-purple">
                                        <span>Rejoindre</span>
                                    </a>

                                    <!-- Game's Social Links -->
                                    <div class="d-flex gap-2">
                                        <a href="<?php print($game["twitch"]) ?>" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="<?php print($game["nameGame"]) ?> twitch link" class="hover-accent focus-accent"></a>
                                        <a href="<?php print($game["reddit"]) ?>" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="<?php print($game["nameGame"]) ?> reddit link" class="hover-accent focus-accent"></a>
                                        <a href="<?php print($game["officialWebsite"]) ?>" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="<?php print($game["nameGame"]) ?> official website link" class="hover-accent focus-accent"></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <?php $counter += 1; ?>
                    <?php endforeach; ?>

                </div>

                <!-- Carousel bottom dots -->
                <div class="carousel-indicators py-2">
                    <?php
                    $slide_counter = 0;
                    while ($slide_counter < $counter) :
                    ?>

                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php print($slide_counter) ?>" class="<?php if ($slide_counter === 0) print("active"); ?> bg-white" <?php if ($slide_counter === 0) print('aria-current="true"') ?> aria-label="Slide <?php print($slide_counter + 1) ?>"></button>

                    <?php
                    $slide_counter += 1;
                    endwhile; ?>
                </div>

            </div>
        </div>
        
        <!-- Show more games (Mobile) -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 d-flex justify-content-center align-items-center d-lg-none gap-3 pb-4">
            <div class="flex-fill divider"></div>
            <a href="games.php" class="btn lh-buttons-purple rounded-2 px-2">Voir plus</a>
            <div class="flex-fill divider"></div>
        </div>

        <!-- Games Cards (Desktop) -->
        <div class="container-fluid bg-color-purple-faded pt-5 pb-5 px-0 d-none d-lg-block">

            <!-- Cards -->
            <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0">
                <h2 class="pb-4 reconstruct">Nos Univers</h2>
                <div class="container-fluid px-0">
                    <div class="row row-cols-2 row-cols-xl-4 g-3">

                        <!-- Display first 4 games -->
                        <?php
                        foreach($games->getOnlyXGames(4) as $game): ?>
                        
                        <!-- Game Card -->
                        <section class="col">
                            <div class="card desktop-card">
                                <img src="<?php print($game["image"]) ?>" alt="images-<?php print($game["nameGame"]) ?>" class="card-img-top">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h3 class="card-title"><?php print($game["nameGame"]) ?></h3>
                                    <div class="card-text">
                                        <p><?php print($game["descriptionShort"]) ?></p>
                                    </div>
                                </div>

                                <!-- Card Footer -->
                                <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                    <!-- Join Team -->
                                    <a href="hub.php?game=<?php print(str_replace(" ", "+",$game["nameGame"])) ?>" class="btn lh-buttons-purple px-3">
                                        <span>Rejoindre</span>
                                    </a>
                                    <!-- Game's Social Links -->
                                    <div class="d-flex gap-2">
                                        <a href="<?php print($game["twitch"]) ?>" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="<?php print($game["nameGame"]) ?> twitch link" class="icon-30x30 hover-accent focus-accent"></a>
                                        <a href="<?php print($game["reddit"]) ?>" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="<?php print($game["nameGame"]) ?> reddit link" class="icon-30x30 hover-accent focus-accent"></a>
                                        <a href="<?php print($game["officialWebsite"]) ?>" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="<?php print($game["nameGame"]) ?> official website link" class="icon-30x30 hover-accent focus-accent"></a>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <?php endforeach; ?>

                    </div>
                </div>

            </section>

            <!-- Show more games -->
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 d-flex justify-content-between align-items-center gap-3 mt-4">
                <div class="flex-fill divider"></div>
                <a href="games.php" class="btn lh-buttons-purple rounded-2 px-2">Voir plus</a>
                <div class="flex-fill divider"></div>
            </div>

        </div>


        <!-- Second Divider (Mobile) -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-4 d-lg-none">
            <hr>
        </div>

        <!-- About us -->
        <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-4 pt-lg-5">
            <div class="row">
                <h2 class="pb-4 reconstruct">Qui Sommes-Nous</h2>
                <div class="col-lg-9">
                    <p>Nous sommes passionnés par les jeux vidéo, tout comme vous. Nous sommes bien plus qu'un simple réseau social - nous sommes la destination incontournable pour tous les gamers, quels que soient vos jeux préférés, votre style de jeu ou votre niveau d'expérience.</p>
                    <h3 class="my-4">LIGHTNINGHUB a été créé par des gamers, pour les gamers. </h3>
                    <p>Notre mission est de connecter les joueurs, de célébrer leur passion commune pour les jeux vidéo et de créer une communauté où le partage de connaissances, l'échange d'expériences et la création de liens solides sont à l'honneur.</p>
                    <p>Nous croyons que les jeux vidéo sont bien plus qu'un simple passe-temps, ce sont une culture à part entière. Nous célébrons la diversité des jeux, des joueurs et des expériences qu'ils offrent. Notre communauté est ouverte à tous, quels que soient votre niveau d'expertise ou votre bagage dans l'univers des jeux vidéo.</p>
                    <p>Rejoignez-nous aujourd'hui et faites partie d'une communauté vibrante où le jeu est au cœur de tout. Que vous soyez un passionné de jeux rétro, un fan de jeux en ligne compétitifs ou simplement quelqu'un qui cherche à se détendre avec des jeux occasionnels.
                        <br>
                    Ensemble, faisons de chaque partie une aventure inoubliable.</p>
                    <p class="mt-4"><strong>Bienvenue dans le monde où le Jeu Rencontre la Communauté.</strong></p>
                </div>
            </div>
        </section>


    </main>

    <?php require_once(__DIR__."/../view/footer.php") ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>