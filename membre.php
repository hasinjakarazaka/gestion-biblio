<?php
 
 $db = new PDO('mysql:host=localhost;dbname=biblio;','root','');



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document  </title>
</head>
<body>



    <?php
        $recupUser = $db->query('SELECT * FROM membres');
        while ($user = $recupUser->fetch()){
            ?>
           <p><?= $user['nom'] ; ?></p>   
           <button><a href="supprimer.php?CIN=<?=$user['CIN']?>">supprimer</a></button>
        <?php
        }


    ?>
</body>
</html>  