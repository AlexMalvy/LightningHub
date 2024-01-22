<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Connexion</title>
    <link rel="icon" type="image/png" href="assets/images/logo-lightninghub.png">
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/errors.js" defer></script>

</head>
<body>
<?php


require_once(__DIR__."/../bootstrap/app.php")
?>
    <?php require_once(__DIR__."/../view/header_nav.php") ?>
   
    <!-- Main -->
    <main class="mt-lg-5 pt-lg-5">

        <h1 class="container text-center pt-5 reconstruct d-lg-none">Connexion/<br>Inscription</h1>
        <h1 class="container text-center pt-5 reconstruct d-none d-lg-block">Connexion / Inscription</h1>

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="container">
                <div class="col-lg-8 offset-lg-2 alert alert-<?=$_SESSION['type']?>" role="alert">
                    <?php echo '<span class="text-white">' . $_SESSION['message'] . '</span>'?>
                </div>
            </div>
        <?php unset($_SESSION['message']);
              unset($_SESSION['type']);
        ?>
        <?php endif; ?>

        
        <!-- First Divider (Mobile) -->
        <div class="container py-2 d-lg-none">
            <hr>
        </div>

        <!-- Connection / Login -->
        <div class="container py-4 mt-lg-5">
            <div class="col-lg-8 offset-lg-2">

                <!-- Tabs -->
                <ul class="nav nav-underline border-0 justify-content-center justify-content-lg-start ms-lg-5 mb-3" id="myTab" role="tablist">
                    <!-- Connection tab head -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-white focus-accent-shadow active" id="connexion-tab" data-bs-toggle="tab" data-bs-target="#connexion-tab-pane" type="button" role="tab"aria-controls="connexion-tab-pane" aria-selected="true">Connexion</button>
                    </li>

                    <!-- Login tab head -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-white focus-accent-shadow" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane"aria-selected="false">Inscription</button>
                    </li>
                </ul>

                <!-- Content + Img Window -->
                <div class="row border">
                    
                    <!-- Content -->
                    <div class="col-lg-6 px-0">
                        <div class="tab-content bg-dark h-100 px-lg-5 pt-3 d-flex align-items-center justify-content-center" id="myTabContent">
                            <!-- Connection tab content -->
                            <div class="tab-pane fade show active flex-fill" id="connexion-tab-pane" role="tabpanel" aria-labelledby="connexion-tab" tabindex="0">
                                <div class="container">
                                    <form action="handlers/User-handler.php" method="POST" class="d-flex flex-column py-3">
                                        <input type="text" name="action" value="login" hidden>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="mb-3 rounded bg-white border text-black">

                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" id="password" class="mb-3 rounded bg-white border text-black">

                                        <div class="mb-3">
                                            <input type="checkbox" name="rememberme" id="remember me">
                                            <label for="remember me" class="ps-2">Se souvenir de moi</label>
                                        </div>

                                        <button type="submit" class="btn lh-buttons-purple">Je me connecte</button>
                                    </form>
                                    <p>Mot de passe oublié ?<br>
                                    <a href="#" class="text-decoration-none link-light fw-bold" data-bs-toggle="modal" data-bs-target="#forgetMail" >Réinitialiser mon mot de passe</a>
                                    </p>
                                </div>
                            </div>

                            <!-- Login tab content -->
                            <div class="tab-pane fade flex-fill" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
                                <div class="container">
                                    <form action="handlers/User-handler.php" method="POST" class="d-flex flex-column py-3">
                                        <input type="text" name="action" value="store" hidden>
                                        <label for="nickname">Pseudo   (Visible)</label>
                                        <input type="text" name="nickname" id="nickname" class="mb-3 rounded bg-white border text-black">

                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="mb-3 rounded bg-white border text-black">

                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" id="password" class="mb-3 rounded bg-white border text-black">

                                        <div class="mb-3">
                                            <input type="checkbox" name="adult" id="adult">
                                            <label for="adult" class="ps-2">Je confirme avoir plus de 18 ans.</label>
                                        </div>

                                        <div class="mb-3">
                                            <input type="checkbox" name="cgu" id="cgu">
                                            <label for="cgu" class="ps-2">J'accepte les <a href="legal.php" class="text-decoration-none link-light fw-bold">conditions d'utilisations</a></label>
                                        </div>

                                        <button type="submit" class="btn lh-buttons-purple">Je m'inscris</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Flavor Img -->
                    <div class="col-lg-6 px-0 d-none d-lg-block login-img">
                    </div>

                </div>

            </div>
        </div>

        <?php include(__DIR__."/../view/modal_forget_email.php") ?>

    </main>
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
    <?php require_once(__DIR__."/../view/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>