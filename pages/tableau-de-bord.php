<?php
require('../inc/empruntDDB.php');
?>

<!-- Afficher le tableau de bord de l'utilisateur avec les livres empruntés -->
<h2>tableau de bord </h2>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date d'emprunt</th>
        <th>Date de retour prévue</th>
        <th>statut du livre</th>
    </tr>
    <?php while ($book = $borrowedBooks->fetch()) { ?>
        <tr>
            <td><?= $book['titre'] ?></td>
            <td><?= $book['auteur'] ?></td> 
            <td><?= $book['date_emprunt'] ?></td>
            <td><?= $book['date_retour'] ?></td>
            <td><?= $book['statut'] ?></td>
            <td>
                <form action="retirer_emprunt.php" method="post">
                    <input type="hidden" name="id_emprunt" value="<?= $book['id_emprunt'] ?>">
                    <button type="submit">Retirer l'emprunt</button>
                </form>
            </td>
        
        </tr>

    <?php 
 
} ?>
</table>
