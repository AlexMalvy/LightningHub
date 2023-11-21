<?php 

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

$database_name = "LH"; 

// Sélectionnez la nouvelle base de données
$conn->select_db($database_name);

 // Créez une table
 $sql_create_table = "CREATE TABLE IF NOT EXISTS `jeux` (
   `id` int NOT NULL AUTO_INCREMENT,
   `nom` varchar(30) NOT NULL,
   `description` text NOT NULL,
   PRIMARY KEY (`id`)
 )";

if ($conn->query($sql_create_table) === TRUE) {
    echo "La table 1 a été créée avec succès.";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
} 


// Créez une table
$sql_create_table2 = "CREATE TABLE IF NOT EXISTS `Messages` (
  `id2` int NOT NULL AUTO_INCREMENT,
  `contenu` varchar(500) NOT NULL,
  `envoyeur` int NOT NULL,
  `receveur` int NOT NULL,
  `dateMsg` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id2`))";

if ($conn->query($sql_create_table2) === TRUE) {
    echo "La table 2 a été créée avec succès.";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
} 

// Créez une table
$sql_create_table3 = "CREATE TABLE IF NOT EXISTS `Users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `pseudo` varchar(30) NOT NULL,
    `mail` varchar(30) NOT NULL,
    `mdp` varchar(30) NOT NULL,
    `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `dateDerniereCo` datetime NOT NULL,
    `adulte` tinyint(1) NOT NULL,
    `avatar` varchar(100) NOT NULL,
    `typeDeCompte` int NOT NULL,
    PRIMARY KEY (`id`)
  )";

if ($conn->query($sql_create_table3) === TRUE) {
    echo "La table 3 a été créée avec succès.";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
} 

// Insérez des données dans la table
  $sql_insert_data = "INSERT INTO `jeux` (`nom`, `description`) VALUES
  ('World of Warcraft', 'MMO emblématique, Azeroth vous attend pour des aventures épiques, des batailles épiques, et une communauté de joueurs incroyable. Rejoignez la légende.'),
  ('Valorant', 'Un jeu de tir tactique multijoueur par Riot Games, où les agents spéciaux s\'affrontent dans des affrontements intenses mêlant compétences et précision.'),
  ('EA Sport FC 24', 'EA SPORTS FC™ 24 vous plonge au cœur de The World\'s Game pour vous offrir le jeu de football le plus réaliste au monde, la façon de jouer et l\'apparence de plus de 19 000 athlètes lors de chaque match.'),
  ('Call of Duty Warzone', 'Call of Duty: Warzone est un jeu vidéo de battle royale mettant en scène jusqu\'à 150 joueurs par partie et jusqu\'à 200 joueurs dans certains modes.');
  ";


  if ($conn->query($sql_insert_data) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}  

?>