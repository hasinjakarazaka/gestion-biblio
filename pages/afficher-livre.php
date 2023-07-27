<?php
require('../inc/ddb.php');



?>



<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficher tous livre</title>
    <style>
        table td {
            border: solid;
        }
    </style>
</head>
<body>
    <h1>livre</h1>

    
    <?php
        $recupUser = $db->query('SELECT * FROM livre');
        while ($user = $recupUser->fetch()){
            ?>
           <div style="border:  1px solid;">
           <img src="export.php?id_livre=<?=$user['id_livre']?>" alt="livre">
           <h1><?= $user['titre']; ?></h1>
           <p><?= $user['auteur']; ?></p>
           <p><?= $user['synopsis']; ?></p>
             <a href="modifier-livre.php?id_livre=<?=$user['id_livre']?>">
             <button>modifier livre</button>
           
             </a>
           </div>
           <br>

          
        <?php
        }


    ?>
    
    