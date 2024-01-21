<!doctype html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../assets/images/logo-lightninghub.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Admin - Dashboard</title>
</head>
<body>


<main>

    <div class="navbar-brand my-lg-3 ps-lg-3 d-none d-lg-block">Tableau de bord</div>

    <div class="d-lg-flex">

        <?php require_once base_path("view/admin/components/nav_admin.php") ?>
        <?php displayErrorsAndMessages(); ?>
        <section id="dashboard-welcome" class="bg-color-purple-faded ms-lg-5 px-3 text-lg-start w-100">
            <p class="nav-dashboard-title ps-lg-3 my-4 py-4 reconstruct">Accueil</p>
            <hr class="d-lg-none mx-3">
            <ul class="list-unstyled d-lg-flex justify-content-lg-around">
                <div>
                    <li class="dashboard-title ps-lg-3 text-center mb-5 mb-lg-0">Nombre d'utilisateurs</li>
                    <hr class="d-none d-lg-block ms-3 mb-lg-5">
                    <li class="dashboard-title ps-lg-3 mb-3 text-center"><i class="fa-regular fa-user fa-2xl"></i></li>
                    <li class="dashboard-title ps-lg-3 text-center"><?php echo $users ?> Membres</li>
                </div>
                <hr class="mx-3">
                <div>
                    <li class="dashboard-title ps-lg-3 mb-5 mb-lg-0">Nombre de salons</li>
                    <hr class="d-none d-lg-block ms-3 mb-lg-5">
                    <li class="dashboard-title ps-lg-3 mb-3 text-center"><i class="fa-brands fa-rocketchat fa-2xl"></i></li>
                    <li class="dashboard-title ps-lg-3 text-center"><?php echo $hubs ?> salons</li>
                </div>
                <hr class="mx-3">
                <div>
                    <li class="dashboard-title ps-lg-3 mb-5 mb-lg-0">Nombre de jeux</li>
                    <hr class="d-none d-lg-block ms-3 mb-lg-5">
                    <li class="dashboard-title ps-lg-3 mb-3 text-center"><i class="fa-solid fa-gamepad fa-2xl"></i></li>
                    <li class="dashboard-title ps-lg-3 text-center"><?php echo $games ?> jeux</li>
                </div>
                <hr class="mx-3">
                <div>
                    <li class="dashboard-title ps-lg-3 mb-5 mb-lg-0">Nombre de FAQ</li>
                    <hr class="d-none d-lg-block ms-3 mb-lg-5">
                    <li class="dashboard-title ps-lg-3 mb-3 text-center"><i class="fa-solid fa-question fa-2xl"></i></li>
                    <li class="dashboard-title ps-lg-3 pb-3 text-center"><?php echo $faqs ?> FAQ</li>
                </div>
            </ul>
        </section>

    </div>

</main>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
</body>
</html>
