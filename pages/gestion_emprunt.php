<?php
require('../inc/ddb.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion emprunt</title>
</head>
<body>
   <h2>Gestion des demandes d'emprunt en attente</h2>

        <table>
            <tr>
                <th>Titre du livre</th>
                <th>Auteur</th>
                <th>Utilisateur</th>
                <th>Date d'emprunt</th>
                <th>Action</th>
            </tr>

            <?php
            $recupDemandes = $db->query('SELECT emprunt.*, livre.titre, livre.auteur, membres.nom FROM emprunt 
                                        JOIN livre ON emprunt.id_livre = livre.id_livre
                                        JOIN membres ON emprunt.id_user = membres.CIN
                                        WHERE emprunt.statut = "en attente"');

            while ($demande = $recupDemandes->fetch()) {
                ?>
                <tr>
                    <td><?= $demande['titre'] ?></td>
                    <td><?= $demande['auteur'] ?></td>
                    <td><?= $demande['nom'] ?></td>
                    <td><?= $demande['date_emprunt'] ?></td>
                    <td>
                        <a href="validate_emprunt.php?id_emprunt=<?= $demande['id_emprunt'] ?>">Valider</a> |
                        <a href="refuse_emprunt.php?id_emprunt=<?= $demande['id_emprunt'] ?>">Refuser</a>
                    </td>
                </tr>
            <?php
            }
            ?>


</body>
</html>




