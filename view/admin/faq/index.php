<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Home</title>
    <link rel="icon" type="image/png" href="../assets/images/logo-lightninghub.png">
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="navbar-brand my-lg-3 ps-lg-3 d-none d-lg-block">Tableau de bord</div>

<div class="d-lg-flex">

    <?php require_once base_path('view/admin/components/nav_admin.php'); ?>


<section id="dashboard-faq" class="bg-color-purple-faded ms-lg-5 px-3 text-lg-start">
    <p class="nav-dashboard-title ps-lg-3 my-4 py-4">FAQ</p>
    <hr class="d-lg-none mx-3">
    <ul class="list-unstyled d-lg-flex">
        <div>
            <li class="ps-lg-3 mb-3 mb-lg-0">Question</li>
            <hr class="d-none d-lg-block ms-3 mb-lg-5">
            <li class="ps-lg-3 mb-3">Qu’est-ce que Lightning Hub considère comme un comportement haineux ?</li>
        </div>
        <hr class="mx-3">
        <div>
            <li class="ps-lg-3 mb-3 mb-lg-0">Réponse</li>
            <hr class="d-none d-lg-block ms-3 mb-lg-5">
            <li class="ps-lg-3 mb-3">Les comportements haineux, qui désignent tout contenu ou activité qui favorise, encourage ou met en avant la discrimination, le dénigrement, l’objectivation, le harcèlement ou la violence</li>
        </div>
        <hr class="mx-3">
        <div>
            <li class="dashboard-title ps-lg-3 mb-3 mb-lg-0">Actions</li>
            <hr class="d-none d-lg-block ms-3 mb-lg-5">
            <div class="d-flex justify-content-end">
                <li class="dashboard-title ps-lg-3 mb-3 me-3"><a href="#"><i class="fa-solid fa-pen fa-xl text-white"></i></a></li>
                <li class="dashboard-title ps-lg-3 mb-3 me-3"><a href="#"><i class="fa-solid fa-trash fa-xl text-danger"></i></a></li>
            </div>
        </div>
    </ul>
</section>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>