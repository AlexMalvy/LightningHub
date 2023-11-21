<?php

echo '<script src="https://kit.fontawesome.com/c608f59341.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" >
';

$servername = "localhost"; // Change this if your database is on a different server
$username = "root"; // Your MySQL username
$password = "root"; // Your MySQL password
$database = "test"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "BIEN VU BG<br>";
}

// Créez une nouvelle base de données
$database_name = "LH"; // Remplacez par le nom de votre nouvelle base de données
/* $sql_create_database = "CREATE DATABASE $database_name";

if ($conn->query($sql_create_database) === TRUE) {
    echo "La base de données a été créée avec succès.";
} else {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
} */

// Sélectionnez la nouvelle base de données
$conn->select_db($database_name);




 
$sql = "SELECT * FROM jeux"; // Remplacez "nom_de_votre_table" par le nom de votre table

// Exécutez la requête SQL
$result = $conn->query($sql);

// Vérifiez si des données ont été récupérées
/* if ($result !== false && $result->num_rows > 0) {
    // Parcourez les données et affichez-les
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row["id"] . " - Nom : " . $row["nom"] . " - Description : " . $row["description"] . "<br>";
        // Ajoutez d'autres colonnes à afficher selon votre structure de table
    }
} else {
    echo "Aucune donnée trouvée dans la table.";
} */
 



echo '<div class="container pb-4 d-lg-none">
<div id="carouselExampleCaptions" class="carousel slide bg-color-purple-faded">

    <!-- Carousel Title + Arrow -->
    <div class="d-flex justify-content-between align-items-center ps-3 pt-2">
        <h2 class="m-0 reconstruct" style="font-size: 20px;">Nos Univers</h2>
        <!-- Carousel Left/Right Arrow -->
        <div>
            <button class="btn px-1" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"><img src="assets/carousel-left-arrow-37x37.png" alt=""></button>
            <button class="btn px-1" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"><img src="assets/carousel-right-arrow-37x37.png" alt=""></button>
        </div>
    </div>

    <!-- Carousel content -->
    <div class="carousel-inner"> "';
    while ($row = $result->fetch_assoc()) {
        // Ajoutez d'autres colonnes à afficher selon votre structure de table
        echo '<div class="carousel-item active">
        <section class="card bg-transparent border-0 m-2 px-2">
            <div class="card-body px-0">
                <h5 class="card-title">'. $row["nom"] .'</h5>
                <p class="card-text">' . $row["description"] .'Plongez dans un univers fantastique où des champions aux pouvoirs uniques s\'affrontent pour la suprématie.</p>
                <p class="card-text mb-4">Coopérez avec vos coéquipiers pour atteindre la victoire dans des parties palpitantes. Relevez le défi et devenez une légende dans l\'arène de League of Legends !</p>
                <div class="d-flex justify-content-between">

                    <!-- League of Legends Join Team -->
                    <a href="#" class="btn bg-color-purple rounded-5 d-inline-flex btn-hover">
                        <span class="align-self-center fw-bold">Trouver une Team</span>
                    </a>

                    <!-- League of Legends Social Links -->
                    <div class="d-flex gap-2">
                        <a href="https://www.twitch.tv/directory/category/league-of-legends"><img src="assets/twitch-icon-37x37.png" alt=""></a>
                        <a href="https://www.reddit.com/r/leagueoflegends/"><img src="assets/reddit-icon-37x37.png" alt=""></a>
                        <a href="https://www.leagueoflegends.com/"><img src="assets/outerlink-icon-37x37.png" alt=""></a>
                    </div>
                </div>
            </div>
        </section>
    </div>';
    };

    echo '

        
        
    </div>

    <!-- Carousel bottom dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active bg-white" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="bg-white" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="bg-white" aria-label="Slide 3"></button>
    </div>

</div>
</div>';


 

// Now you can perform database operations using $conn.

// Close the connection when you're done
$conn->close();
?>