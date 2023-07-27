<!-- validate_emprunt.php -->
<?php
require('../inc/ddb.php');
session_start();

// Vérifier si l'utilisateur est connecté et est un administrateur, sinon rediriger vers la page de connexion
if (!isset($_SESSION['CIN']) ) {
    header('Location: login.php');
    exit;
}

// Récupérer l'ID de la demande d'emprunt à valider depuis les paramètres de l'URL
if (isset($_GET['id_emprunt'])) {
    $id_emprunt = $_GET['id_emprunt'];

    // Mettre à jour le statut de la demande en "valide"
    $updateStatut = $db->prepare('UPDATE emprunt SET statut = "valide" WHERE id_emprunt = ?');
    $updateStatut->execute([$id_emprunt]);

    // Rediriger vers la page d'administration avec un message de succès
    header('Location: adminIndex.php?success=validated');
    exit;
} else {
    // Rediriger vers la page d'administration en cas de problème
    header('Location:adminIndex.php');
    exit;
}
?>

