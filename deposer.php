<?php

 
$db = new PDO('mysql:host=localhost;dbname=biblio;','root','');
if(isset($_POST['submit'])){
    if(!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['snp']) ){
        $titre = htmlspecialchars($_POST['title']);
        $auteur = htmlspecialchars($_POST['author']);
        $snp = nl2br(htmlspecialchars($_POST['snp']));
       

         
        $inserLivre = $db->prepare('INSERT INTO livre(titre,auteur,synopsis,img )VALUES(?,?,?,?)');
        $inserLivre->execute(array($titre,$auteur,$snp,file_get_contents($_FILES['image']['tmp_name'])));
        header('location: adminIndex.php');


    }else{
        echo 'veuiller completer tous les champs';   
}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposer un livre</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <p>image<input type="file" name="image"></p> 
        <p>titre<input type="text" name="title"></p>
        <p>auteur<input type="text" name="author"></p>
        <p>Synopsis <textarea name="snp" ></textarea></p>
        <p><input type="submit" name="submit"></p>
    </form>
  
</body>
</html>  