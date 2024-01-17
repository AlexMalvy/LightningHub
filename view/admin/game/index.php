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


    <section id="dashboard-hub" class="ms-lg-5 text-lg-start w-100">

        <div class="d-flex bd-highlight justify-content-between bg-color-purple-faded">
            <h2 class="p-2 bd-highlight">JEUX</h2>
            <div class="p-2 bd-highlight">
                <form action="game_edit.php" method="GET">
                    <button type="submit" id="newRoom" aria-controls="create-room-button" aria-selected="false" class="btn lh-buttons-purple text-end">Créer un salon</button>
                </form>
            </div>
        </div>


        <table class="table bg-color-purple-faded ">
            <thead class="">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody class="">
            <tr class="">
                <td class="">Les Maîtres de la faille</td>
                <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>
                <td class="text-center">
                    <a href="hub_edit.php" id="nav-update-hub">
                        Ico
                        <img  src="../assets/images/pen-solid-20x20.png" alt="modifier le salon/voir
                        les membres">
                    </a>
                </td>
            </tr>
            <tr>
                <td>Les Maîtres de la faille</td>
                <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>
                <td class="text-center">Ico X</td>
            </tr>
            <tr>
                <td>Les Maîtres de la faille</td>
                <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>
                <td class="text-center">Ico X</td>
            </tr>
            </tbody>
        </table>

    </section>




</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>