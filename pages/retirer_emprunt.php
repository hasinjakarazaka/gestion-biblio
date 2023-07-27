<?php
require('../inc/ddb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_emprunt'])) {
    $id_emprunt = htmlspecialchars($_POST['id_emprunt']);

    // Requête pour supprimer l'emprunt de la base de données
    $deleteEmprunt = $db->prepare('DELETE FROM emprunt WHERE id_emprunt = ?');
    $deleteEmprunt->execute([$id_emprunt]);

    // Redirection vers le tableau de bord après la suppression
    header('Location: article.php');
    exit;
} else {
    echo "Requête non autorisée.";
}
?>