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

    use App\Models\Games;

    require_once(__DIR__."/../bootstrap/app.php")
    ?>
    <?php require_once(__DIR__."/../view/header_nav.php") ?>
        
    <main>
        <!-- Games Cards -->
        <section class="container-fluid bg-color-purple-faded pt-5 pb-5 px-0 game-margin-top">

            <!-- Cards -->
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0">
            <h1>Nos Univers</h1>
                <ul class="row list-unstyled">

                    <!-- Test Start -->
                    <?php
                    $games = new Games();
                    foreach($games->allGamesList as $game): ?>

                    <!-- Game Card -->
                    <li class="col-12 col-md-6 col-xl-3 mb-3">
                        <section class="card desktop-card">
                            <img src="<?php print($game["image"]) ?>" alt="images-<?php print($game["nameGame"]) ?>" class="card-img-top">

                            <!-- Card Body -->
                            <div class="card-body">
                                <h2 class="card-title"><?php print($game["nameGame"]) ?></h2>
                                <div class="card-text">
                                    <p><?php print($game["description"]) ?></p>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer d-flex justify-content-between align-items-center border-0 mb-2 bg-transparent">

                                <!-- Join Team -->
                                <a href="<?php print(str_replace(" ", "+",$game["nameGame"])) ?>" class="btn lh-buttons-purple px-3">
                                    <span>Rejoindre</span>
                                </a>

                                <!-- Game's Social Links -->
                                <div class="d-flex gap-2">
                                    <a href="<?php print($game["twitch"]) ?>" target="_blank"><img src="assets/images/twitch-icon-37x37.png" alt="twitch-<?php print($game["nameGame"]) ?>" class="icon-30x30"></a>
                                    <a href="<?php print($game["reddit"]) ?>" target="_blank"><img src="assets/images/reddit-icon-37x37.png" alt="reddit-<?php print($game["nameGame"]) ?>" class="icon-30x30"></a>
                                    <a href="<?php print($game["officialWebsite"]) ?>" target="_blank"><img src="assets/images/outerlink-icon-37x37.png" alt="site-<?php print($game["nameGame"]) ?>" class="icon-30x30"></a>
                                </div>
                            </div>
                        </section>
                    </li>
                    
                    <?php endforeach; ?>
                    <!-- End Test -->
                </ul>
            </div>
        </section>

    </main>


    <?php require_once(__DIR__."/../view/footer.php") ?>
          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
</body>
