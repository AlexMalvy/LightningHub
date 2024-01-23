<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lightning Hub - Support</title>
    <link rel="icon" type="image/png" href="assets/images/logo-lightninghub.png">
    <script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require_once(__DIR__."/../bootstrap/app.php"); ?>
    <?php require_once(__DIR__."/../view/header_nav.php") ?>

    <!-- Main -->
    <main class="pt-lg-5">

        <!-- FAQ -->
        <section class="container-fluid px-0 py-5 mt-lg-5">
            <div class="col-lg-10 offset-lg-1 px-2 px-md-5 px-lg-0">

                <h1 class="reconstruct pb-4">Faq</h1>

                <div class="row">
                    <div class="col-lg-7">
                        <!-- Accordion -->
                        <div class="accordion" id="accordionExample">

                            <?php foreach (App\Controllers\admin\FaqController::class::home() as $key => $item): ?>

                                <!-- Accordion Item 1 -->
                                <div class="accordion-item mt-3 rounded-0">
                                    <!-- Header -->
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-color-purple rounded-0 focus-accent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key;?>" aria-expanded="false" aria-controls="collapse<?php echo $key;?>">
                                            <?php echo $item["question"];?>
                                        </button>
                                    </h2>
                                    <!-- Body -->
                                    <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse bg-color-purple-faded" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-color-purple-faded">
                                            <p><?php echo $item["answer"]?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                    <!-- Flavor Img -->
                    <div class="d-none d-lg-flex align-items-center col-lg-4 offset-lg-1">
                        <img src="assets/images/faq-img-1.png" alt="" class="img-fluid">
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
                <h2 class="reconstruct pb-3">Contacter le Support</h2>

                <div class="row">
                    <div class="d-none d-lg-flex align-items-center col-lg-4">
                        <img src="assets/images/faq-img-2.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-7 offset-lg-1 pe-lg-0">
                        <form action="">
                            <label for="pseudo" class="mb-2">Pseudo :</label>
                            <input type="text" maxlength= 25 name="pseudo" id="pseudo" class="mb-4 w-100 input" required aria-required="true" placeholder="Fatality67">

                            <label for="email" class="mb-2">Adresse email :</label>
                            <input type="email" maxlength= 40 name="email" id="email" class="mb-4 w-100 input" required aria-required="true" placeholder="Fatality67@email.com">

                            <label for="message" class="mb-2">Votre message :</label>
                            <textarea name="message" maxlength= 2000 id="message" cols="30" rows="10" class="mb-4 w-100 input" required aria-required="true" placeholder="J'aime le chocolat chaud ! :D"></textarea>

                            <button type="submit" class="btn lh-buttons-purple w-100 mb-3 ">Envoyer</button>
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