<?php
require('../inc/ddb.php');
session_start();
$img = $_SESSION['img'];
$id_img = $_SESSION['id_livre'];

$dossier = '../assets/images/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 2000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
}
if($taille>$taille_maxi)
{
$erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si
    {
    $sary  = "update livre set img_name='$fichier',img_time=curtime() where id_livre=$id_img";
    $sql_sary = $db->query($sary);

    //izay sary soloina dia alana
        $path = "../assets/images/$img";
        unlink($path);        
header('Location:accueil.php');
    }
    else //Sinon (la fonction renvoie FALSE).
    {
    echo 'Echec de l\'upload !';
    }
}
else
{
echo $erreur;
}

?>