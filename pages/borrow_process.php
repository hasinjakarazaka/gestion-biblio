
<?php
require('../inc/ddb.php');
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['CIN'])) {
    header('Location: login.php');
    exit;
}

// Récupérer l'ID de l'utilisateur connecté
$user_id = $_SESSION['CIN'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_livre = $_POST['id_livre'];

    // Vérifier si le livre est disponible
    $checkAvailable = $db->prepare('SELECT id_livre FROM livre WHERE id_livre = ? AND id_livre NOT IN (SELECT id_livre FROM emprunt WHERE statut = "valide")');
    $checkAvailable->execute([$id_livre]);
    $bookAvailable = $checkAvailable->fetchColumn();

    if ($bookAvailable) {
        // Enregistrez la demande d'emprunt dans la table "emprunt"
        // la date d'emprunt est enregister automatiquement apres validation
        $insertRequest = $db->prepare('INSERT INTO emprunt (id_livre, id_user, date_emprunt, statut) VALUES (?, ?, NOW(), "en attente")');
        $insertRequest->execute([$id_livre, $user_id]);
        $successMessage = "Votre demande d'emprunt a été enregistrée en attente de validation.";
        header('Location: article.php');
    } else {
        $errorMessage = "Ce livre n'est pas disponible pour l'emprunt.";
    }
} else {
    header('Location: dashboard.php');
    exit;
}
?>


<?php if (isset($successMessage)) { ?>
    <p><?= $successMessage ?></p>
<?php } elseif (isset($errorMessage)) { ?>
    <p><?= $errorMessage ?></p>
<?php } ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>en attente</title>
</head>
<body>
    
</body>
</html>