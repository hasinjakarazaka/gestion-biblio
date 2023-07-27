<?php
require('../inc/ddb.php');

$user_id = $_SESSION['CIN'];
$userInfo = $db->prepare('SELECT * FROM membres WHERE CIN = ?');
$userInfo->execute([$user_id]);
$user = $userInfo->fetch();


?>