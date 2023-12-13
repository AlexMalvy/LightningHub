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

        <?php require_once(__DIR__ . "/nav_admin.php") ?>

<!--     HUB   -->


        <section id="hub" class="bg-color-purple-faded ms-lg-5 text-center text-lg-start ">
            <p class="nav-dashboard-title ps-lg-3 my-4 py-4">SALONS</p>
            <hr class="d-lg-none mx-3">

            <ul class="list-group list-group-flush p-0">


                <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                    <div href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none col-2">
                        Suamel1
                    </div>

                    <div href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none col-2">
                        Suamel1
                    </div>

                    <div href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none col-2">
                        Suamel1
                    </div>

                    <div href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none col-2">
                        Suamel1
                    </div>

                    <!-- Send message button -->
                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                       data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">

                        <img class="icon-20x20" src="assets/images/message-solid-white.svg" alt="message icon">
                    </a>

                    <!-- Delete friend button -->
                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                       data-bs-toggle="modal" data-bs-target="#deleteFriendModal">
                        <img class="icon-20x20" src="assets/images/user-minus-solid-white.svg" alt="delete icon">
                    </a>

                    <!-- Delete Friend Modal -->
                    <div class="modal fade" id="deleteFriendModal" tabindex="-1" aria-labelledby="deleteFriendModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-color-purple rounded-0">
                                    <h5 class="modal-title fs-5" id="deleteFriendModalLabel">Delete Friend</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir supprimer cet ami ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn lh-buttons-purple-faded" data-bs-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn lh-buttons-red">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>

                <li class="list-group-item d-flex bg-color-purple-faded align-items-center">

                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none ">
                        <img class="me-2 avatar-50x50" src="assets/images/gon.jpg" alt="player avatar-70x70">SpongeBob</a>
                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                       data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                        <img class="icon-20x20" src="assets/images/message-solid-white.svg" alt="message icon"></a>
                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"
                       data-bs-toggle="modal" data-bs-target="#deleteFriendModal">
                        <img class="icon-20x20" src="assets/images/user-minus-solid-white.svg" alt="delete icon"></a>


                </li>

            </ul>


<!--            <table class="table bg-transparent">-->
<!--                <thead class="bg-transparent">-->
<!--                <tr>-->
<!--                    <th scope="col">Titre</th>-->
<!--                    <th scope="col">Description</th>-->
<!--                    <th scope="col">Nombre de participants</th>-->
<!--                    <th scope="col">Jeux</th>-->
<!--                    <th scope="col">Actions</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody class="bg-transparent">-->
<!--                <tr class="bg-transparent">-->
<!--                    <td class="">Les Maîtres de la faille</td>-->
<!--                    <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>-->
<!--                    <td>5</td>-->
<!--                    <td>Lol</td>-->
<!--                    <td>Ico X</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Les Maîtres de la faille</td>-->
<!--                    <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>-->
<!--                    <td>5</td>-->
<!--                    <td>Lol</td>-->
<!--                    <td>Ico X</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Les Maîtres de la faille</td>-->
<!--                    <td>Rejoignez nous pour une expérience ultime et forgez votre légende sur la faille...</td>-->
<!--                    <td>5</td>-->
<!--                    <td>Lol</td>-->
<!--                    <td>Ico X</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
        </section>


        <!--FIN HUB-->

    </div>


</main>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
<script src="../assets/js/scriptAccount.js"></script>
</body>
</html>
