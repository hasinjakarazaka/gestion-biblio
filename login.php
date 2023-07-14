
<?php
session_start();

include 'ddb.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['name']) && !empty($_POST['mdp'])){
        $default_name = "admin";
        $default_mdp = "admin1234";

        $name_saisi = htmlspecialchars($_POST['name']);
        $mdp_saisi =htmlspecialchars($_POST['mdp']);  


//admin
        if($name_saisi == $default_name && $mdp_saisi == $default_mdp){
            $_SESSION['mdp'] = $mdp_saisi; 
            header('Location: adminIndex.php');
        }else{
            echo " votre mot de passe est incorrect";
        }
    }else{
        echo "veuiller completer tous les champs ou   ";
    } 
//user

       $nom =htmlspecialchars($_POST['name']) ;
       $mdp =htmlspecialchars($_POST['mdp']);

       $recupUser = $db-> prepare('SELECT * FROM membres WHERE nom = ? AND mdp = ?');
       $recupUser->execute(array($nom,$mdp));

        if($recupUser->rowCount() >0){ 
            $_SESSION['nom'] = $nom;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['CIN'] = $recupUser->fetch()['CIN'];
            header('location: article.php');
            
        }else{
            echo"votre mot de  passe ou nom est incorrect";
        }


}




 
?>  
<html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
     <body>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                              
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="name"  placeholder="saisissez un nom">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" name="mdp"  placeholder="saisissez un mot de passe" autocomplete="off">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" name="submit" class="btn btn-primary">valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>




