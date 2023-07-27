<?php
require('../inc/ddb.php');
session_start();

$id_livre = $_GET['id_livre'];
$id_user = $_SESSION['CIN'];

if (isset($id_user)) {
    // Vérifie si l'utilisateur n'a pas déjà emprunté le livre
    $checkBorrowed = $db->prepare('SELECT COUNT(*) FROM emprunt WHERE id_livre = ? AND id_user = ?');
    $checkBorrowed->execute([$id_livre, $id_user]);
    $alreadyBorrowed = $checkBorrowed->fetchColumn();

    if ($alreadyBorrowed == 0) {
        // Empruntez le livre
        $borrowBook = $db->prepare('INSERT INTO emprunt (id_livre, id_user) VALUES (?, ?)');
        $borrowBook->execute([$id_livre, $id_user]);
        echo "Livre emprunté avec succès !";
    } else {
        echo "Vous avez déjà emprunté ce livre.";
    }
} else {
    echo "Impossible de se connecter.";
}





