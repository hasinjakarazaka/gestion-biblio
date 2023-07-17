<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=biblio;','root','');

if(isset($_POST['submit'])){
   if(!empty($_POST['cin']) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['statut']) && !empty($_POST['email']) && !empty($_POST['cotisation'])){
    //    recuperation des donnees du formulaire et verification
        $CIN = htmlspecialchars($_POST['cin']);
        $name =htmlspecialchars($_POST['nom']) ;
        $mdp = htmlspecialchars($_POST['mdp']);
        $statut =htmlspecialchars($_POST['statut']) ;
        $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // L'adresse e-mail est valide 
            } else {
                echo" L'adresse e-mail est invalide";
            }
        $cotisation = htmlspecialchars($_POST['cotisation']);  
    
    // inserer dans la bdd

    $inserUser = $db->prepare('INSERT INTO membres(CIN,nom,mdp,statut,email,cotisation) VALUES( ?, ?, ?, ?, ?, ?)');
    $inserUser->execute(array( $CIN, $name, $mdp, $statut, $email, $cotisation));
    header('location: adminIndex.php');  

}
else{
    echo "veuiller completer tous les champs";
} 

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         label{
             display: block;
         
         }
     </style>
</head>
<body>
    <form  method="POST"  action="">

    <label for="civilite">numero CIN </label><input type="text" name="cin"  autocomplete="off"> <br>
    <label for="civilite"> nom </label><input type="text" name="nom"  autocomplete="off"> <br>
    <label for="civilite">mot de passe</label>  <input type="text" name="mdp"  autocomplete="off"> <br>
    <label for="civilite"> statut</label> <input type="text" name="statut"> <br>
    <label for="civilite">adresse email</label><input type="text" name="email"  autocomplete="off"> <br>
    <label for="civilite"> cotisation</label><input type="text" name="cotisation"  autocomplete="off"><br>
    <label for="civilite"> </label><input type="submit" name="submit"> 


    </form>
</body>
</html>