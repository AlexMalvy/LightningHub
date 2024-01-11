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

<?php //require_once base_path('view/components/menu.php'); ?>
<?php require_once base_path('view/header_nav.php'); ?>
<?php displayErrorsAndMessages() ?>
<?php // require_once(__DIR__."/../view/header_nav.php") ?>

<!-- Main -->
<main>

    <!-- Introduction -->
    <section>
        <div class="container-fluid d-flex align-items-center first-background-img px-0 first-section">
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 py-5">
                <h2 class="reconstruct">Entre Dans Le Game</h2>
                <p class="py-2 d-none d-lg-block">Trouvez facilement des partenaires de jeu partageant vos intérêts, que ce soit pour des sessions compétitives ou simplement pour le fun.</p>
                <p class="mb-4">
                    Rejoins-nous pour vivre des expériences <br> <strong>gaming inoubliables.</strong>
                </p>
                <a href="hub.php" class="btn lh-buttons-purple">
                    <img src="assets/images/hub-icon-37x37.png" alt="">
                    <span class="ps-2">Trouver une Team</span>
                </a>
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

                <!-- League of Legends Card -->
                <div class="carousel-item active">
                    <section class="card bg-transparent border-0 m-2 px-2">
                        <img src="assets/images/Leagues-of-legends.png" class="card-img-top" alt="images-leagues-of-legends">
                        <div class="card-body px-0">
                            <h3 class="card-title">League of Legends</h3>
                            <p class="card-text">Plongez dans un univers fantastique où des champions aux pouvoirs uniques s'affrontent pour la suprématie.</p>
                            <p class="card-text mb-4">Coopérez avec vos coéquipiers pour atteindre la victoire dans des parties palpitantes. Relevez le défi et devenez une légende dans l'arène de League of Legends !</p>
                            <div class="d-flex justify-content-between">

                                <!-- League of Legends Join Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>

                                <!-- League of Legends Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/league-of-legends" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="league of legends twitch link" class="hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/leagueoflegends/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="league of legends reddit link" class="hover-accent focus-accent"></a>
                                    <a href="https://www.leagueoflegends.com/" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="league of legends official website link" class="hover-accent focus-accent"></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Valorant Card -->
                <div class="carousel-item">
                    <section class="card bg-transparent border-0 m-2 px-2">

                        <img src="assets/images/valorant.png" class="card-img-top" alt="images-valorant">

                        <div class="card-body px-0">
                            <h3 class="card-title">Valorant</h3>

                            <p class="card-text">Plongez dans un univers fantastique où des champions aux pouvoirs uniques s'affrontent pour la suprématie.</p>
                            <p class="card-text mb-4">Coopérez avec vos coéquipiers pour atteindre la victoire dans des parties palpitantes. Relevez le défi et devenez une légende dans l'arène de League of Legends !</p>
                            <div class="d-flex justify-content-between">

                                <!-- Valorant Join Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>

                                <!-- Valorant Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/valorant" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="Valorant twitch link" class="hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/VALORANT/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="Valorant reddit link" class="hover-accent focus-accent"></a>
                                    <a href="https://playvalorant.com/" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="Valorant official website link" class="hover-accent focus-accent"></a>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>

                <!-- World of Warcraft Card -->
                <div class="carousel-item">
                    <section class="card bg-transparent border-0 m-2 px-2">
                        <img src="assets/images/world-of-warcraft.png" class="card-img-top" alt="images-warcraft">
                        <div class="card-body px-0">
                            <h3 class="card-title">World-of-Warcraft</h3>
                            <p class="card-text">Plongez dans un univers fantastique où des champions aux pouvoirs uniques s'affrontent pour la suprématie.</p>
                            <p class="card-text mb-4">Coopérez avec vos coéquipiers pour atteindre la victoire dans des parties palpitantes. Relevez le défi et devenez une légende dans l'arène de League of Legends !</p>
                            <div class="d-flex justify-content-between">

                                <!-- World of Warcraft Join Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>

                                <!-- World of Warcraft Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/world-of-warcraft" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="World of Warcraft twitch link" class="hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/wow/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="World of Warcraft reddit link" class="hover-accent focus-accent"></a>
                                    <a href="https://worldofwarcraft.blizzard.com/" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="World of Warcraft official website link" class="hover-accent focus-accent"></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Carousel bottom dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active bg-white" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="bg-white" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="bg-white" aria-label="Slide 3"></button>
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

                    <!-- League of Legends Card -->
                    <section class="col">
                        <div class="card desktop-card">
                            <img src="assets/images/Leagues-of-legends.png" alt="images-Leagues-of-legends" class="card-img-top">
                            <!-- League of Legends Card Body -->
                            <div class="card-body">
                                <h3 class="card-title">League of Legends</h3>
                                <div class="card-text">
                                    <p>League of Legends est un jeu de stratégie en équipe dans lequel deux équipes de cinq champions s'affrontent pour détruire la base adverse.</p>
                                </div>
                            </div>

                            <!-- League of Legends Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- League of Legends Join Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- League of Legends Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/league-of-legends" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="League of legends twitch link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/leagueoflegends/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="League of legends reddit link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://www.leagueoflegends.com/" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="League of legends official website link" class="icon-30x30 hover-accent focus-accent"></a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Valorant Card -->
                    <section class="col">
                        <div class="card desktop-card">
                            <img src="assets/images/valorant.png" alt="images-valorant" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">Valorant</h3>
                                <div class="card-text">
                                    <p>Dans Valorant, chaque joueur joue le rôle d'un « agent » aux compétences uniques.</p>
                                </div>
                            </div>

                            <!-- Valorant Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- Valorant Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- Valorant Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/valorant" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="Valorant twitch link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/VALORANT/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="Valorant reddit link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://playvalorant.com/" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="Valorant official website link" class="icon-30x30 hover-accent focus-accent"></a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- World of Warcaft Card -->
                    <section class="col">
                        <div class="card desktop-card">
                            <img src="assets/images/world-of-warcraft.png" alt="images-world-of-warcraft" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">World of Warcaft</h3>
                                <div class="card-text">
                                    <p>World of Warcraft est un jeu vidéo de rôle massivement multijoueur se déroulant dans l'univers développé dans les trois premiers Warcraft.</p>
                                </div>
                            </div>

                            <!-- World of Warcaft Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- World of Warcaft Join Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- World of Warcaft Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/world-of-warcraft" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="World of Warcraft twitch link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/wow/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="World of Warcraft reddit link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://worldofwarcraft.blizzard.com/" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="World of Warcraft official website link" class="icon-30x30 hover-accent focus-accent"></a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Call of Duty Warzone Card -->
                    <section class="col">
                        <div class="card desktop-card">
                            <img src="assets/images/call-of-duty-warzone.png" alt="image-call-of-duty-warzone" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">Warzone</h3>
                                <div class="card-text">
                                    <p>Call of Duty: Warzone est un jeu vidéo de battle royale mettant en scène jusqu'à 150 joueurs par partie</p>
                                </div>
                            </div>

                            <!-- Warzone Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- Warzone Join Team -->
                                <a href="hub.php" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- Warzone Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/call-of-duty-warzone" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="Call of Duty Warzone twitch link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://www.reddit.com/r/CODWarzone/" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="Call of Duty Warzone reddit link" class="icon-30x30 hover-accent focus-accent"></a>
                                    <a href="https://www.callofduty.com/fr/playnow/warzone" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="Call of Duty Warzone official website link" class="icon-30x30 hover-accent focus-accent"></a>
                                </div>
                            </div>
                        </div>
                    </section>

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

<?php require_once base_path('view/footer.php'); ?>
<?php // require_once base_path('view/components/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>