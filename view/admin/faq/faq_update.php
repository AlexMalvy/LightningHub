
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

    <section id="dashboard-faq" class="ms-lg-5 text-lg-start col-lg-10">

        <div class="d-flex bd-highlight justify-content-between bg-color-purple-faded">
            <h2 class="nav-dashboard-title px-lg-3 my-4 py-4 reconstruct">Modifier une faq</h2>
        </div>

        <div class=" bg-color-purple-faded" >
            <div class="py-3">
                <div class="row-cols-1 px-3">

                    <?php $idToShow = isset($_GET['id']) ? $_GET['id'] : null; ?>

                    <?php foreach ($faqs as $faq):?>
                        <?php if($faq->getId() == $idToShow): ?>
                    <!-- New FAQ Form -->
                    <form action="faq_create.php" method = "POST" class="row py-lg-3">
                        <input type="text" name="action" value="update" hidden>
                        <input type="number" name="idFaq" value="<?php echo $faq->getId(); ?>" hidden>
                        <!-- Left Side -->
                        <div class="col-lg-9 d-lg-flex flex-column">
                            <div>
                                <label for="question_faq" class="mb-2">Question</label>
                                <input type="text" name="question" value="<?php echo $faq->getQuestion(); ?>" id="question_faq" maxlength="40" class="input mb-4 w-100" required aria-required="true">
                            </div>

                            <div>
                                <label for="answer_faq" class="mb-2">Réponse</label>
                                <textarea name="answer" id="answer" maxlength="100" cols="10" rows="7" class="input mb-4 w-100" required aria-required="true"><?php echo $faq->getAnswer(); ?></textarea>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="d-lg-flex col-lg-5 offset-lg-4 mt-5">
                            <a class="btn w-100 lh-buttons-purple-faded mb-3 me-lg-4" href="faq.php">Annuler</a>
                            <button class="btn w-100 lh-buttons-purple mb-3">Modifier</button>
                        </div>
                    </form>
                        <?php endif; ?>
                    <?php endforeach;  ?>

                </div>
            </div>

        </div>


    </section>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>