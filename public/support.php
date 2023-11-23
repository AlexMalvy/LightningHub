<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Support</title>
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require_once(__DIR__."/../view/header_nav.php") ?>

    <!-- Main -->
    <main class="pt-lg-5">

        <!-- FAQ -->
        <section class="container-fluid px-0 py-5 mt-lg-5">
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0">

                <h2 class="reconstruct pb-4">Faq</h2>

                <div class="row">
                    <div class="col-lg-7">
                        <!-- Accordion -->
                        <div class="accordion" id="accordionExample">

                            <!-- Accordion Item 1 -->
                            <div class="accordion-item rounded-0">
                                <!-- Header -->
                                <h3 class="accordion-header">
                                    <button class="accordion-button faq-accordion-button collapsed bg-color-purple rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Qu’est-ce que Lightning Hub considère comme un comportement haineux ?
                                    </button>
                                </h3>
                                <!-- Body -->
                                <div id="collapseOne" class="accordion-collapse collapse bg-color-purple-faded" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-color-purple-faded">
                                        <p>Les comportements haineux, qui désignent tout contenu ou activité qui favorise, encourage ou met en avant la discrimination, le dénigrement, l’objectivation, le harcèlement ou la violence</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion Item 2 -->
                            <div class="accordion-item mt-3">
                                <!-- Header -->
                                <h3 class="accordion-header">
                                    <button class="accordion-button faq-accordion-button collapsed bg-color-purple" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Dans quelle mesure suis-je responsable de ma communauté ?
                                    </button>
                                </h3>
                                <!-- Body -->
                                <div id="collapseTwo" class="accordion-collapse collapse bg-color-purple-faded" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-color-purple-faded">
                                        <p>Les créateurs de salons et leaders des communautés qu’ils créent ou entretiennent. C’est pourquoi ils doivent tenir compte des conséquences de leurs déclarations et des actions de leur public</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion Item 3 -->
                            <div class="accordion-item mt-3 rounded-0">
                                <!-- Header -->
                                <h3 class="accordion-header">
                                    <button class="accordion-button faq-accordion-button collapsed bg-color-purple rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Que dois-je faire dans le cas où quelqu'un se rendrait coupable de comportements haineux
                                    </button>
                                </h3>
                                <!-- Body -->
                                <div id="collapseThree" class="accordion-collapse collapse bg-color-purple-faded" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-color-purple-faded">
                                        <p>Nous demandons aux streamers d’agir en toute bonne foi pour modérer leur chat , la mise sur pied d’une équipe de modération et/ou le recours à un des nombreux outils tiers à votre disposition.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Flavor Img -->
                    <div class="d-none d-lg-flex align-items-center col-lg-4 offset-lg-1">
                        <img src="assets/faq-img-1.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        
        <!-- First Divider (Mobile) -->
        <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0 pb-4 d-lg-none">
            <hr>
        </div>

        <!-- Contact Form -->
        <section class="container-fluid bg-color-purple-faded py-4 px-0">
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0">
                <h2 class="reconstruct pb-3">Contact the Support</h2>

                <div class="row">
                    <div class="d-none d-lg-flex align-items-center col-lg-4">
                        <img src="assets/faq-img-2.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-7 offset-lg-1 pe-lg-0">
                        <form action="">
                            <label for="pseudo" class="d-block mb-2">Pseudo :</label>
                            <input type="text" name="pseudo" id="pseudo" class="d-block mb-4 w-100 rounded bg-white border-0" required aria-required="true">

                            <label for="email" class="d-block mb-2">Adresse email :</label>
                            <input type="email" name="email" id="email" class="d-block mb-4 w-100 rounded bg-white border-0" required aria-required="true">

                            <label for="message" class="d-block mb-2">Votre message :</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="d-block mb-4 w-100 rounded bg-white border-0" required aria-required="true"></textarea>

                            <button type="submit" class="btn w-100 bg-color-purple rounded-5 mb-3 px-4 py-2 btn-hover fw-bold">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        <div class="container-fluid py-5"></div>

        <?php require_once(__DIR__."/../view/footer.php") ?>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>