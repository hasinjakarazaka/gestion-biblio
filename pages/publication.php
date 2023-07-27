<?php
require('../inc/ddb.php');
if(isset($_POST['publie'])){
    if(!empty($_POST['annonce'])){
     
        $pub = nl2br(htmlspecialchars($_POST['annonce']));
               
        $inserPub = $db->prepare('INSERT INTO publication(annonce )VALUES(?)');
        $inserPub->execute(array($pub));
      
    }else{
        echo 'veuiller completer tous les champs';   
}
header('location:article.php');
}



//recupere la publication pour l'afficher







?>