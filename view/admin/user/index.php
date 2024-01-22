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


        <div class="d-flex bg-color-purple-faded justify-content-between ">
            <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Utilisateurs</h2>
        </div>


        <table class="table bg-color-purple-faded">
            <thead class="">
            <tr>
                <th scope="col" class="fs-3 text-center">Pseudo</th>
                <th scope="col" class="fs-3 text-center">Email</th>
                <th scope="col" class="fs-3 text-center">Identifiants In-Game</th>
                <th scope="col" class="fs-3 text-center">Banissements</th>
                <th scope="col" class="fs-3 text-center">Signalement</th>
                <th scope="col" class="fs-3 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $userController = new App\Controllers\UserController();
            $users = $userController->selectAllUsers();
            $games = new App\Models\Games();
            $bans = App\Controllers\admin\ModerationController::class::selectAllTypes();
            ?>

            <?php foreach($users as $user): ?>
            <?php
                $idInGameUsername = new \App\Controllers\PlayGamesController($user->getId());
                $userBans = App\Controllers\admin\ModerationController::class::selectBanById($user->getId());
                $userReports = App\Controllers\admin\ModerationController::class::countReportsById($user->getId());
                ?>
            <tr>
                <td class="text-center"><?php echo $user->getUsername();?></td>
                <td class="text-center"><?php echo $user->getEmail();?></td>
                <td class="text-center">
                    <select class="input w-50">
                        <?php foreach($idInGameUsername->getInGameUsername() as $key => $userIngame):?>
                            <?php foreach($games->allGamesList as $game):?>
                                 <?php if($game['idGame'] === $userIngame['idGame']): ?>
                        <option> <?php echo $userIngame['inGameUsername'] . ' ---- ' . $game['nameGame'];?></option>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </td>

                <?php if (!empty($userBans)): ?>
                    <?php foreach ($userBans as $userBan): ?>
                        <td class="text-center">
                            <?php if ($user->getId() === $userBan['idUser']): ?>
                                <?php echo $userBan['nameBan']; ?>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                <?php else: ?>
                    <td class="text-center"></td>
                <?php endif; ?>

                <?php if (!empty($userReports)): ?>
                    <?php foreach ($userReports as $userReport): ?>
                        <td class="text-center"><?php echo $userReport['report'] ?></td>
                    <?php endforeach; ?>
                <?php endif; ?>


                <td class="text-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#moderation" data-user-id="<?php echo $user->getId();?>">
                        <img src="../assets/images/ban-solid.svg" alt="Gestion de la modération"></a>
                </td>
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