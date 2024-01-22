<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

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



    <section id="dashboard-user" class="ms-lg-5 text-lg-start col-lg-10">


        <div class="d-flex bd-highlight justify-content-between">
            <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Signalements</h2>
        </div>


        <table class="table bg-color-purple-faded">
            <thead class="">
            <tr>
                <th scope="col" class="fs-3 text-center">Pseudo</th>
                <th scope="col" class="fs-3 text-center">Message</th>
                <th scope="col" class="fs-3 text-center">Date</th>
            </tr>
            </thead>
            <tbody>


            <?php foreach($signales as $signal): ?>

                <tr>
                    <td class="text-center"><?php $user = (new App\Controllers\admin\UserController)->getUserById($signal->getIdUser1());
                        echo  $user->getUserName();?></td>
                    <td class="text-center"><?php echo $signal->getMessage();?></td>
                    <td class="text-center"><?php echo $signal->getTimeMessage();?></td>






                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <?php require_once base_path('view/modal_moderation.php'); ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>