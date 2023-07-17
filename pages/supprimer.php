<?php



require('../inc/ddb.php');



if(isset($_GET['CIN']) && !empty($_GET['CIN'])){
    $getid = $_GET['CIN'];
    $recupUser = $db->prepare('SELECT * FROM membres WHERE CIN = ?');
    $recupUser->execute(array($getid)); 
    if($recupUser->rowCount()>0){

        $deleteUser = $db->prepare('DELETE FROM membres WHERE CIN = ?');
        $deleteUser->execute(array($getid));

        header('location: membre.php');






    }else{
        echo "aucun membre n a ete trouve";
    }

     
}else{
    echo "l'id n'a pas ete recuperer";
}

?>
 