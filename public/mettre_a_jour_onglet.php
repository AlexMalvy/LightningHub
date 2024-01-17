<?php
session_start();

if (isset($_GET['onglet'])) {
    $nouvelOnglet = intval($_GET['onglet']);

    // Mettre à jour l'onglet actif dans la session
    $_SESSION['ongletActif'] = $nouvelOnglet;

    // Répondre avec un message de succès (vous pouvez personnaliser la réponse selon vos besoins)
    echo "L'onglet actif a été mis à jour avec succès.";
} else {
    // Répondre avec un message d'erreur si le paramètre 'onglet' n'est pas défini
    echo "Erreur : Paramètre 'onglet' non défini.";
}
?>
