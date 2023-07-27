<?php
require('../inc/ddb.php');
require('../inc/recupuser.php');
$nom = $user['nom'];

$id_user = $_SESSION['CIN'];

if (isset($id_user)) {
    // Récupérez les livres empruntés par l'utilisateur avec les dates de retour prévues
    $borrowedBooks = $db->prepare('SELECT livre.titre, livre.auteur, emprunt.date_emprunt, emprunt.id_emprunt,
                                    DATE_ADD(emprunt.date_emprunt, INTERVAL 2 WEEK) AS date_retour,
                                    emprunt.statut FROM livre
                                    INNER JOIN emprunt ON livre.id_livre = emprunt.id_livre
                                    WHERE emprunt.id_user = ?');
    $borrowedBooks->execute([$id_user]);
} else {
    echo "Impossible de se connecter.";
    exit;
}
?>
