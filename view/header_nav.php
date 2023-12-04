
<!-- Header mobile -->
<header class="container-fluid p-2 d-flex justify-content-between align-items-center bg-color-purple d-lg-none">
    <img src="assets/images/logo-lightninghub.png" class="logo">
    <h1 class="m-0 fs-3 d-flex flex-column justify-content-center"><span class="pe-2">Lightning</span><span class="ps-1 text-center">Hub</span></h1>
</header>


<!-- Nav -->
<nav class="container-fluid col-lg-10 offset-lg-1 navbar bg-color-purple fixed-bottom">
    <div class="container-fluid">

        <!-- Brand Name (Desktop Only) -->
        <a class="navbar-brand d-none d-lg-flex justify-content-between align-items-center gap-3" href="index.php">
            <img src="assets/images/logo-lightninghub.png" alt="logo Lightning Hub" class="logo">

            <?php if($_SERVER['REQUEST_URI'] == '/LightningHub/public/index.php') :
                echo '<h1 class="m-0 fs-3"><span class="pe-2">LIGHTNING</span><span class="ps-1 text-center">HUB</span></h1>';
            else :
                echo '<span class="pe-2">LIGHTNING</span><span class="ps-1 text-center">HUB</span>';
            endif; ?>
        </a>

        <!-- Navbar -->
        <div class="row flex-grow-1 flex-lg-grow-0">

            <!-- Home link -->
            <div class="col-3 d-lg-none">
                <a href="index.php" class="d-flex flex-column flex-lg-row align-items-lg-center gap-lg-2 link-light text-decoration-none link-opacity-100 link-opacity-75-hover">
                    <div class="d-flex justify-content-center">
                        <img src="assets/images/home-icon-37x37.png" alt="" class="d-lg-none">
                    </div>
                    <p class="m-0 text-center">Home</p>
                </a>
            </div>

            <!-- Hub link -->
            <div class="col-3 col-lg-auto">
                <a href="hub.php" class="d-flex flex-column flex-lg-row align-items-lg-center gap-lg-2 link-light text-decoration-none link-opacity-100 link-opacity-75-hover">
                    <div class="d-flex justify-content-center">
                        <img src="assets/images/hub-icon-37x37.png" alt="" class="d-lg-none">
                    </div>
                    <p class="m-0 text-center">Hub</p>
                </a>
            </div>
            
            <!-- Socials link -->
            <div class="col-3 col-lg-auto">
                <a href="socials.php" class="d-flex flex-column flex-lg-row align-items-lg-center gap-lg-2  link-light text-decoration-none link-opacity-100 link-opacity-75-hover">
                    <div class="d-flex justify-content-center">
                        <img src="assets/images/friends-icon-37x37.png" alt="" class="d-lg-none">
                    </div>
                    <p class="m-0 text-center">Socials</p>
                </a>
            </div>

            <!-- Account/Connection link -->
            <div class="col-3 col-lg-auto">

                <!-- OffCanvas Toggler (Mobile Only) -->
                <a href="#" class="d-flex flex-column flex-lg-row align-items-lg-center gap-lg-2 d-lg-none link-light text-decoration-none" type="button" data-bs-toggle="offcanvas"data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"aria-label="Toggle navigation">
                    <div class="d-flex justify-content-center">
                        <img src="assets/images/account_icon_37x37.png" alt="" class="d-lg-none">
                    </div>
                    <p class="m-0 text-center text-white">Connexion</p>
                </a>

                <!-- Account/Connection Dropdown (Desktop Only) -->
                <div class="dropdown d-none d-lg-block">

                    <a href="sign_in.php" class="d-flex align-items-center gap-1 link-light text-decoration-none dropdown-toggle link-opacity-100 link-opacity-75-hover" type="button" data-bs-toggle="dropdown"aria-expanded="false">
                        <p class="m-0 text-center text-white">Connexion</p>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end py-3 drop-down-fix-position">

                        <li class="dropdown-item">
                            <a class="d-flex flex-row justify-content-start align-items-center gap-2 nav-link link-light link-opacity-100 link-opacity-75-hover  hover-accent-outline focus-accent-outline" href="account.php">
                                <div>
                                    <img src="assets/images/account_icon_37x37.png" alt="" class="icon-25x25">
                                </div>
                                <p class="align-self-center m-0">Mon Compte</p>
                            </a>
                        </li>

                        <hr>

                        <li class="dropdown-item d-flex flex-row justify-content-start align-items-center gap-2">
                            <a class="d-flex flex-row justify-content-start align-items-center gap-2 nav-link link-danger link-opacity-100 link-opacity-75-hover  hover-accent-outline focus-accent-outline" href="login.php">
                                <div>
                                    <img src="assets/images/disconnect-icon-37x37.png" alt="" class="icon-25x25">
                                </div>
                                <p class="align-self-center m-0">Déconnexion</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- OffCanva (Mobile) -->
        <div class="offcanvas offcanvas-bottom h-auto bottom-nav-margin d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            
            <!-- Header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <h2 class="offcanvas-title w-100 text-center" id="offcanvasNavbarLabel">Menu</h2>
            </div>

            <!-- Body -->
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center fs-5">
                    <li class="nav-item d-flex flex-row justify-content-start align-items-center gap-2">
                        <div>
                            <img src="assets/images/account_icon_37x37.png" alt="">
                        </div>
                        <a class="nav-link link-light  hover-accent-outline focus-accent-outline" href="account.php">Mon Compte</a>
                    </li>
                    <hr>
                    <li class="nav-item d-flex flex-row justify-content-start align-items-center gap-2">
                        <div>
                            <img src="assets/images/disconnect-icon-37x37.png" alt="">
                        </div>
                        <a class="nav-link link-danger  hover-accent-outline focus-accent-outline" href="login.php">Déconnexion</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
