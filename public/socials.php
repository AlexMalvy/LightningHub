<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Home</title>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php require_once(__DIR__."/../view/header_nav.php") ?>

    <!-- Main -->
    <main class="dernierAvantFoot">

        <!-- Introduction -->
        <section class="d-none d-lg-block">
            <div class="container-fluid d-flex align-items-center px-0 first-section-social">
                <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 py-5">
                    <h2 class="reconstruct" style="font-size: 20px;">Social</h2>


                </div>
            </div>

        </section>

        <!-- SECTION Mon profil -->

        <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-1 py-2 py-lg-0">
            <div class="card bg-color-purple-faded col-lg-6 offset-lg-6">
                <div class="row g-0 text-center align-items-center justify-content-between">
                    <div class="card-header col-3 bg-color-purple d-none d-lg-block">
                        Ton id :
                    </div>

                    <p class="list-group-item col-4 m-0">
                        <a href="#" class="w-100 bd-highlight link-light text-decoration-none d-flex align-items-center">
                            <img class="mx-2" src="assets/images/rick.jpg" style="width: 2.5rem; height: 2.5rem; border-radius: 50%;" alt=""> Ismael#42069
                        </a>
                    </p>
                    <a href="#" class="list-group-item col-3 text-end me-2">Copy <img src="assets/images/copy-regular.svg" style="width: 1.5rem;" alt=""></a>


                </div>
            </div>
        </section>


        <!-- SECTION Onglets -->
        <section class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-1">

            <!-- Tabs -->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <!-- Friends tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white active" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends-tab-pane" type="button" role="tab" aria-controls="friends-tab-pane" aria-selected="true">Mes amis</button>
                </li>

                <!-- Pending tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white " id="demandes-tab" data-bs-toggle="tab" data-bs-target="#demandes-tab-pane" type="button" role="tab" aria-controls="demandes-tab-pane" aria-selected="false">Demandes d'ajout</button>
                </li>

                <!--  tab head -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-white" id="add-tab" data-bs-toggle="tab" data-bs-target="#add-tab-pane" type="button" role="tab" aria-controls="add-tab-pane" aria-selected="false">Ajouter</button>
                </li>


            </ul>

            <!-- Content -->
            <div class="tab-content bg-color-purple-faded" id="myTabContent">

                <!-- FRIENDS tab content -->
                <div class="tab-pane fade show active border" id="friends-tab-pane" role="tabpanel" aria-labelledby="friends-tab" tabindex="0">

                    <div class="container-fluid">
                        <div class="row  ">
                            <!-- row-cols-1 row-cols-md-2 row-cols-lg -->
                            <!-- Disconnected Friends Switch -->
                            <div class="d-flex bd-highlight">
                                <div class="p-2 w-100 bd-highlight">Voir mes amis déconnectés</div>
                                <div class="form-check form-switch p-2 flex-shrink-1 bd-highlight ">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                </div>
                            </div>
                            <ul class="list-group list-group-flush p-0">


                                <li class="list-group-item d-flex bg-color-purple-faded ">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><img src="assets/images/message-solid-white.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/user-minus-solid-white.svg" style="width: 1.5rem;" alt=""></a>


                                    <div class="offcanvas offcanvas-bottom h-75" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasBottomLabel">Suamel1</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-2">
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>

                                                    </div>
                                                    <div class="col-9 text-start">
                                                        Hé mec, tu étais en ligne hier soir?
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body row">
                                                    <div>
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/rick.jpg" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Ismael#42069</a>
                                                        <div>
                                                            Ouais, j'étais là. On aurait dû faire une partie ensemble.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body row">
                                                    <div>
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>
                                                        <div>
                                                            Ah zut, j'ai fini par jouer à ce nouveau jeu solo. C'était dingue, des graphismes de malade!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-2">
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>

                                                    </div>
                                                    <div class="col-9 text-start">
                                                        Hé mec, tu étais en ligne hier soir?
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body row">
                                                    <div>
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/rick.jpg" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Ismael#42069</a>
                                                        <div>
                                                            Ouais, j'étais là. On aurait dû faire une partie ensemble.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body row">
                                                    <div>
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>
                                                        <div>
                                                            Ah zut, j'ai fini par jouer à ce nouveau jeu solo. C'était dingue, des graphismes de malade!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-2">
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>

                                                    </div>
                                                    <div class="col-9 text-start">
                                                        Hé mec, tu étais en ligne hier soir?
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-2">
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>

                                                    </div>
                                                    <div class="col-9 text-start">
                                                        Hé mec, tu étais en ligne hier soir?
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-2">
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>

                                                    </div>
                                                    <div class="col-9 text-start">
                                                        Hé mec, tu étais en ligne hier soir?
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body row">
                                                    <div>
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/rick.jpg" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Ismael#42069</a>
                                                        <div>
                                                            Ouais, j'étais là. On aurait dû faire une partie ensemble.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body row">
                                                    <div>
                                                        <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>
                                                        <div>
                                                            Ah zut, j'ai fini par jouer à ce nouveau jeu solo. C'était dingue, des graphismes de malade!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Envoi de msg -->

                                            <form class="mt-3 position-absolute bottom-0 start-0 end-0 m-3">

                                                <div class="input-group inputChat">
                                                    <input type="text" class="form-control bg-light text-dark" placeholder="Ecrivez votre message" id="messageInput">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex bg-color-purple-faded">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/gon.jpg" style="width: 1.5rem;  height: 1.5rem; border-radius: 50%;" alt="">Suamel</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom"><img src="assets/images/message-solid-white.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/user-minus-solid-white.svg" style="width: 1.5rem;" alt=""></a>

                                    <div class="offcanvas offcanvas-bottom h-75" tabindex="-1" id="offcanvasBottom2" aria-labelledby="offcanvasBottomLabel">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasBottomLabel">Suamel2</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">

                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>
                                                </div>

                                                <div class="col-10">
                                                    Hé meuf, tu étais en ligne hier soir?
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/rick.jpg" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Ismael#42069</a>

                                                </div>
                                                <div class="col-10">
                                                    Ouais, j'étais là. On aurait dû faire une partie ensemble.
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-2">
                                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel1</a>
                                                </div>
                                                <div class="col-10">
                                                    Ah zut, j'ai fini par jouer à ce nouveau jeu solo. C'était dingue, des graphismes de malade!
                                                </div>
                                            </div>


                                            <!-- Envoi de msg -->

                                            <form class="mt-3">

                                                <div class="input-group inputChat">
                                                    <input type="text" class="form-control bg-light text-dark" placeholder="Ecrivez votAre message" id="messageInput">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>


                                <div class="flex-fill divider"></div>

                                <li class="list-group-item d-flex bg-color-purple-faded ">

                                    <a href="#" class="p-2 w-100 bd-highlight link-secondary text-decoration-none "><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Disconnect 1</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/message-solid-white.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/user-minus-solid-white.svg" style="width: 1.5rem;" alt=""></a>

                                </li>

                                <li class="list-group-item d-flex bg-color-purple-faded">

                                    <a href="#" class="p-2 w-100 bd-highlight link-secondary text-decoration-none "><img class="me-2" src="assets/images/gon.jpg" style="width: 1.5rem;  height: 1.5rem; border-radius: 50%;" alt="">Disc 2</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/message-solid-white.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/user-minus-solid-white.svg" style="width: 1.5rem;" alt=""></a>

                                </li>


                            </ul>

                        </div>
                    </div>

                </div>


                <!-- LIST DEMANDS tab content -->
                <div class="tab-pane fade show border" id="demandes-tab-pane" role="tabpanel" aria-labelledby="demandes-tab" tabindex="0">

                    <div class="container-fluid">
                        <div class="row  ">
                            <!-- row-cols-1 row-cols-md-2 row-cols-lg -->
                            <!-- Disconnected Friends Switch -->

                            <ul class="list-group list-group-flush p-0">


                                <li class="list-group-item d-flex bg-color-purple-faded ">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/check-solid-green.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/xmark-solid-red.svg" style="width: 1.5rem;" alt=""></a>

                                </li>

                                <li class="list-group-item d-flex bg-color-purple-faded">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img class="me-2" src="assets/images/gon.jpg" style="width: 1.5rem;  height: 1.5rem; border-radius: 50%;" alt="">Suamel</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/check-solid-green.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/xmark-solid-red.svg" style="width: 1.5rem;" alt=""></a>

                                </li>

                                <li class="list-group-item d-flex bg-color-purple-faded ">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img class="me-2" src="assets/images/goku.png" style="width: 1.5rem; height: 1.5rem; border-radius: 50%;" alt="">Suamel</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/check-solid-green.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/xmark-solid-red.svg" style="width: 1.5rem;" alt=""></a>

                                </li>

                                <li class="list-group-item d-flex bg-color-purple-faded">

                                    <a href="#" class="p-2 w-100 bd-highlight link-light text-decoration-none"><img class="me-2" src="assets/images/gon.jpg" style="width: 1.5rem;  height: 1.5rem; border-radius: 50%;" alt="">Suamel</a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/check-solid-green.svg" style="width: 1.5rem;" alt=""></a>
                                    <a href="#" class="p-2 flex-shrink-1 bd-highlight"><img src="assets/images/xmark-solid-red.svg" style="width: 1.5rem;" alt=""></a>

                                </li>


                            </ul>

                        </div>
                    </div>

                </div>

                <!-- ADD FRIEND tab content -->
                <div class="tab-pane fade show p-1 border" id="add-tab-pane" role="tabpanel" aria-labelledby="add-tab" tabindex="0">

                    <div class="container py-3 text-lg-start text-center g-lg-5">
                        <div class="g-3">


                            <p class=""><img src="assets/images/user-plus-solid.svg" style="width: 1.5rem;" alt="">Ajouter un ami</p>


                            <!--  <div class="card-body text-center bg-color-purple-faded"> -->
                            <input type="text" class="" id="searchFriend" aria-describedby="Rechercher un ami">
                            <p class="">User found<img class="ms-2" src="assets/images/check-solid.svg" style="width: 1.5rem;" alt=""></p>
                            <a href="#" class="btn bg-color-purple rounded-5 d-inline-flex px-4 btn-hover fw-bold text-center ">Ajouter
                            </a>



                        </div>
                    </div>

                </div>



            </div>


        </section>


        <?php require_once(__DIR__."/../view/footer.php") ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>