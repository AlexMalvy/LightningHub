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
        <!-- Games Cards -->
        <section class="container-fluid bg-color-purple-faded pt-5 pb-5 px-0 game-margin-top dernierAvantFoot">

            <!-- Cards -->
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0">
            <h2 class="pb-4 reconstruct">Nos Univers</h2>
                <ul class="row list-unstyled">

                    <!-- League of Legends Card -->
                    <li class="col-12 col-md-6 col-xl-3 mb-3">
                        <section class="card border-0 rounded-0 desktop-card card-height">
                            <img src="assets/images/leagues-of-legends.png" alt="images-leagues-of-legends" class="card-img-top">
                            <!-- League of Legends Card Body -->
                            <div class="card-body">
                                <h3 class="card-title">League of Legends</h3>
                                <div class="card-text">
                                    <p>League of Legends est un jeu de stratégie en équipe dans lequel deux équipes de cinq champions s'affrontent pour détruire la base adverse. <br> Faites votre choix parmi plus de 140 champions disponibles, partez au combat, éliminez vos adversaires avec adresse et abattez les tourelles ennemies pour décrocher la victoire.</p>
                                </div>
                            </div>
                            <!-- League of Legends Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- League of Legends Join Team -->
                                <a href="#" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- League of Legends Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/league-of-legends"><img src="assets/images/twitch-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://www.reddit.com/r/leagueoflegends/"><img src="assets/images/reddit-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://www.leagueoflegends.com/"><img src="assets/images/outerlink-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                </div>
                            </div>
                        </section>
                    </li>

                    <!-- Valorant Card -->
                    <li class="col-12 col-md-6 col-xl-3 mb-3">
                        <section class="card border-0 rounded-0 desktop-card card-height">
                            <img src="assets/images/valorant.png" alt="Image-valorant" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">Valorant</h3>
                                <div class="card-text">
                                    <p>Dans Valorant, chaque joueur joue le rôle d'un « agent » aux compétences uniques.<br> Dans le mode de jeu principal, deux équipes de cinq joueurs s'affrontent et les agents utilisent un système économique pour acheter des utilitaires et des armes.</p>
                                </div>
                            </div>
                                
                            <!-- Valorant Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- Valorant Team -->
                                <a href="#" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- Valorant Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/valorant"><img src="assets/images/twitch-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://www.reddit.com/r/VALORANT/"><img src="assets/images/reddit-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://playvalorant.com/"><img src="assets/images/outerlink-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                </div>
                            </div>
                        </section>
                    </li>
    
                    <!-- World of Warcraft Card -->
                    <li class="col-12 col-md-6 col-xl-3 mb-3">
                        <section class="card border-0 rounded-0 desktop-card card-height">
                            <img src="assets/images/world-of-warcraft.png" alt="Image-world-of-warcraft" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">World of Warcraft</h3>
                                <div class="card-text">
                                    <p>World of Warcraft est un jeu vidéo de rôle massivement multijoueur se déroulant dans l'univers développé dans les trois premiers Warcraft. Le joueur y incarne un personnage, dont il peut choisir la race et la classe, devant explorer des donjons et des environnements peuplés de monstres.</p>
                                </div>
                            </div>
                                
                            <!-- World of Warcraft Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- World of Warcraft Join Team -->
                                <a href="#" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- World of Warcraft Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/world-of-warcraft"><img src="assets/images/twitch-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://www.reddit.com/r/wow/"><img src="assets/images/reddit-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://worldofwarcraft.blizzard.com/"><img src="assets/images/outerlink-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                </div>
                            </div>
                        </section>
                    </li>
    
                    <!-- Call of Duty Warzone Card -->
                    <li class="col-12 col-md-6 col-xl-3 mb-3">
                        <section class="card border-0 rounded-0 desktop-card card-height">
                            <img src="assets/images/call-of-duty-warzone.png" alt="Image-call-of-duty-warzone" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">Call of Duty : Warzone</h3>
                                <div class="card-text">
                                    <p>Call of Duty: Warzone est un jeu vidéo de battle royale mettant en scène jusqu'à 150 joueurs par partie (et jusqu'à 200 joueurs dans certains modes).<br> Le jeu propose plusieurs armes, certaines sont issues du jeu Modern Warfare, d'autres de la série Black Ops.</p>
                                </div>
                            </div>
                                
                            <!-- Warzone Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">
                                <!-- Warzone Join Team -->
                                <a href="#" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>
                                <!-- Warzone Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="https://www.twitch.tv/directory/category/league-of-legends"><img src="assets/images/twitch-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://www.reddit.com/r/leagueoflegends/"><img src="assets/images/reddit-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                    <a href="https://www.leagueoflegends.com/"><img src="assets/images/outerlink-icon-37x37.png" alt="" class="social-icon-desktop"></a>
                                </div>
                            </div>
                        </section>
                    </li>
                </ul>
            </div>
        </section>
    </main>


    <?php require_once(__DIR__."/../view/footer.php") ?>
          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
</body>
