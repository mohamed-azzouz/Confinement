<?php
session_start();

 $connexion = mysqli_connect("localhost", "root","","confinement");


 if (isset($_POST['lien']) AND !empty($_POST['lien'])) 
 {
 	$newLien = "INSERT INTO historique(id_utilisateur, id_salon, lien) VALUES ('".$_SESSION['id']."', '".$_GET['id']."', '".$_POST['lien']."')";
 	$queryNewLien = mysqli_query($connexion, $newLien);

 	echo $newLien;
 }


 $requeteHistorique = "SELECT * FROM historique INNER JOIN utilisateurs ON utilisateurs.id = historique.id_utilisateur INNER JOIN salon ON salon.id = historique.id_salon";
 $queryHistorique = mysqli_query($connexion, $requeteHistorique);
 $resultHistorique = mysqli_fetch_all($queryHistorique);

 var_dump($resultHistorique);

 foreach($resultHistorique as $lien): ?>
 	<div><?php echo 'User : '.$lien[5].'&nbsp |'.'Salon : '.$lien[10].'&nbsp |'.' Lien : <a href="'.$lien[3].'">'.$lien[3].'</a>'; ?></div>
 <?php endforeach; ?>




<!DOCTYPE html>
<html>
<head>
	<title>Historique</title>
</head>
<body>

</body>
</html>