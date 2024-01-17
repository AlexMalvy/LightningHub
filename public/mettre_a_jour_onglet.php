<?php
session_start();

if (isset($_GET['onglet'])) {
    $nouvelOnglet = intval($_GET['onglet']);

    $_SESSION['ongletActif'] = $nouvelOnglet;

    echo "L'onglet actif a été mis à jour avec succès.";
} else {
    echo "Erreur : Paramètre 'onglet' non défini.";
}
?>
