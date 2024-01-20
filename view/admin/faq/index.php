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

    <div class="d-flex bd-highlight justify-content-between ">
        <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Faq</h2>
        <div class="nav-dashboard-title px-lg-3 my-4 py-4">
            <form action="faq_create.php" method="POST">
                <input type="text" name="action" value="displayForm" hidden>
                <button type="submit" id="newRoom" aria-controls="create-room-button" aria-selected="false" class="btn lh-buttons-purple text-end">Créer une FAQ
                </button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Question</th>
            <th scope="col">Réponse</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($faqs as $faq):?>
        <tr>
            <td><?php echo $faq->getQuestion(); ?></td>
            <td><?php echo $faq->getAnswer(); ?></td>
            <td class="text-center">
                <a href="faq_create.php?id=<?php echo $faq->getId(); ?>" id="nav-update-hub">
                    <img src="../assets/images/pen-solid-20x20.png" alt="modifier la faq">
                </a>
                <a href="faq_create.php?idFaq=<?php echo $faq->getId(); ?>" id="nav-update-hub">
                    <img class="icon-20x20" src="../assets/images/trash-red.svg" alt="supprimer la faq">
                </a>
            </td>
        </tr>
        <?php endforeach;  ?>

        </tbody>
    </table>

</section>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>