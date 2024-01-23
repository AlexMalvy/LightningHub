<!-- Nav -->
<nav id="nav-dashboard" class="navbar-expand-lg bg-color-purple-faded rounded-0 h-100">
    <div class="container-fluid d-flex justify-content-between flex-lg-column align-items-lg-start ms-lg-3">

        <!-- Nav title (Desktop) -->
        <p class="navbar-brand mt-lg-5 d-none d-lg-block">Menu</p>

        <!-- Nav title (Mobile) -->
        <a class="nav-dashboard-title nav-link mt-lg-5 d-block d-lg-none" href="#">Tableau de bord</a>

        <!-- OffCanva Image Burger (Mobile) -->
        <a  class="d-lg-none text-white pt-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasIconMenu">
            <i class="mt-3 me-2 fa-solid fa-bars fa-2xl"></i>
        </a>

        <!-- OffCanva (Mobile) -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenu">

            <!-- Header -->
            <div class="offcanvas-header">
                <a type="button" data-bs-dismiss="offcanvas" aria-label="Close"> <i class="fa-solid fa-xmark fa-2xl"></i></a>
                <p class="mb-0 fs-3">Menu</p>
            </div>

            <!-- Body -->
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a id="nav-welcome" class="nav-link active mt-4" aria-current="page" href="index.php"><i class="fa-solid fa-house me-2"></i>Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php"><i class="fa-solid fa-reply-all me-2"></i>Site Lightning Hub</a>
                    </li>
                    <hr/>
                    <li class="nav-dashboard-title">Utilisateurs</li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php"><i class="fa-solid fa-user me-2"></i>Voir utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signal.php"><i class="fa-solid fa-ban me-2"></i>Voir signalements</a>
                    </li>
                    <hr/>
                    <li class="nav-dashboard-title">Jeux</li>
                    <li class="nav-item">
                        <a class="nav-link" href="game.php"><i class="fa-solid fa-gamepad me-2"></i>Voir les jeux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="game_create.php"><i class="fa-solid fa-plus me-2"></i>Ajouter un jeu</a>
                    </li>
                    <hr/>
                    <li class="nav-dashboard-title">Salons</li>
                    <li class="nav-item">
                        <a id="nav-hub" class="nav-link" href="hub.php"><i class="fa-solid fa-comments me-2"></i>Voir les salons</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav-create-hub" class="nav-link" href="hub_create.php"><i class="fa-solid fa-plus me-2"></i>Ajouter un salon</a>
                    </li>
                    <hr/>
                    <li class="nav-dashboard-title">FAQ</li>
                    <li class="nav-item">
                        <a id="nav-faq" class="nav-link" href="faq.php"><i class="fa-solid fa-question me-2"></i>Voir les questions</a>
                    </li>
                    <li class="nav-item">
                        <form action="faq_create.php" method="POST">
                            <input type="text" name="action" value="displayForm" hidden>
                            <button class="nav-link mb-5"><i class="fa-solid fa-plus me-2"></i>Ajouter une question</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>



