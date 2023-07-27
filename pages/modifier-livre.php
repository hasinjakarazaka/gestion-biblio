<?php
require('../inc/ddb.php');


if (isset($_GET['id_livre']) && !empty($_GET['id_livre'])){
        $getid = $_GET['id_livre'];


        $recupLivre = $db->prepare('SELECT * FROM livre WHERE id_livre = ?');
        $recupLivre->execute(array($getid));
        $donnee = $recupLivre->fetch(PDO::FETCH_ASSOC);


        if($recupLivre->rowCount()>0){
            $img = $donnee['img'];
            $titre = $donnee['titre'];
            $auteur = $donnee['auteur'];
            $snp = $donnee['synopsis'];

            if(isset($_POST['modifier'])){
               //verifie si l image a ete modofie ou non
                if (isset($_FILES['image']['error']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $img_modif = file_get_contents($_FILES['image']['tmp_name']);
                    if ($img_modif) {
                        // Mettre à jour l'image avec la nouvelle image téléchargée
                        $img = $img_modif;
                    }
                }
    
                
                $titre_modif = htmlspecialchars($_POST['titre']);
                $auteur_modif = htmlspecialchars($_POST['auteur']);
                $snp_modif = htmlspecialchars($_POST['snp']);

                $updateLivre = $db->prepare('UPDATE livre SET titre = ?, auteur = ? , synopsis = ? , img = ? WHERE id_livre = ?');
                $updateLivre->execute(array($titre_modif,$auteur_modif,$snp_modif,$img,$getid));

                
                header('Location: afficher-livre.php');
                exit();
            }
   
  
}else{
    echo "aucun id trouvé"; 
}

}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier livre</title>
</head>
<body> 
    
       

                

    <form  method="POST" action="" enctype="multipart/form-data">
        <img src="export.php?id_livre=<?=$donnee['id_livre']?>" alt="livre">   
            <p><input type="file" name="image"  ></p>
       <label for="titre">titre</label> <input type="text" name="titre" value="<?= $titre;?>">
       <br><br>
       <label for="auteur">auteur</label> <input type="text" name="auteur" value="<?= $auteur;?>">
       <br><br>
       <label for="snp">synopsis</label><textarea name="snp" id="" cols="30" rows="5"><?= $snp?></textarea>
       <br><br>
       <input type="submit" name="modifier">
         
     
       
        
          
    </form>
</body>
</html>