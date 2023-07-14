<?php
include 'ddb.php';



?>



<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <table>
                <tr>    
                    <td> <img src="export.php?id_livre=<?=$user['id_livre']?>" alt="livre"> </td>
                    <td><?= $user['titre']; ?></td>
                    <td><?= $user ['auteur'] ;?></td>
                </tr>
            </table>




           
        <?php
        }


    ?>
    
    
     

</body>
</html> 