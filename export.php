<?php
include 'ddb.php';
 $exp = $db->prepare("SELECT * FROM livre WHERE id_livre = ?  ");
 $exp->setFetchMode(PDO ::FETCH_ASSOC);
 $exp->execute(array($_GET['id_livre']));
 $tab = $exp->fetchAll();
 echo $tab[0]['img'];



?>