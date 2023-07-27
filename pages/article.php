<?php
session_start();
require('../inc/ddb.php');
require('../inc/recupuser.php');


if (!isset($_SESSION['CIN'])) {
    header('Location: login.php');
    exit;
}
?>



<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page membre</title>
    <link rel="stylesheet" href="../assets/css/beaute.css">
 
</head>
<body>
<h2>Bienvenue, <?= $user['nom'] ?> !</h2>
<br>
<h3 >
    Etat de cotisation =>
            <?php
                if ($user['cotisation'] !== null ){
                    echo 'ok';
                }else{
                    echo'vous devez payer votre cotisation';
                }
            ?>
    </h3>
    <h3 >
    statut :
            <?php
               echo $user['statut'] ;
            ?>
    </h3>
<div class="container">
   <a class="deconnexion" href="logout.php">deconnexion</a>
   <div id="gauche">
        <?php
            // $recupUser = $db->query('SELECT * FROM livre');
            // Récupérer les livres disponibles pour l'emprunt
            $availableBooks = $db->query('SELECT * FROM livre WHERE id_livre NOT IN (SELECT id_livre FROM emprunt WHERE statut = "valide")');
            while ($user = $availableBooks ->fetch()){
                ?>
                <div class="block">
                <table>
                    <tr>    
                        <td> <img src="export.php?id_livre=<?=$user['id_livre']?>" alt="livre" width="100px"> </td>                              
                        <td rowspan="3"><?= $user ['synopsis'] ;?></td>
                       
                    </tr>
                    <tr><td><h1><?= $user['titre']; ?></h1></td></tr>
                    <tr><td><h3><?= $user ['auteur'] ;?></h3></td></tr>
                </table>
                <form action="borrow_process.php" method="post">
                    <input type="hidden" name="id_livre" value="<?= $user['id_livre'] ?>">
                    <button type="submit">Emprunter</button>
                 </form>
                                 
              </div>          
            <?php
            }
        ?>
    </div>
    <div class="tableau">
         <?php include 'tableau-de-bord.php'  ?> 
         <!-- annonce dans le site les 3 derniers nouveaux livres -->
         <div id="annonce">
        <h4>Annonce les trois derniers nouveaux livres </h4>
         <form action="publication.php" method="post">
            <textarea name="annonce" id="" cols="30" rows="5"></textarea>
            <input type="submit" name="publie" value="publier">
         </form>
         <?php
        $recupPub = $db->query('SELECT * FROM publication');
        while ($publication = $recupPub->fetch()){
            ?>
          
           
           <p><?= $publication['annonce']; ?></p>
          
           
        <?php
        }


    ?>
    

         </div>

    </div>
    
</div>
    	
      

</body>
</html> 