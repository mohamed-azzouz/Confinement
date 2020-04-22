<?php

session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$bddName = 'confinement';

$connexion = mysqli_connect($servername, $username, $password, $bddName);

include('fonctions.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
	<main>
		HELLO <br /><?php echo $_SESSION['login']; ?>
		<button><a href="disconnect.php">DECO</a></button>
	</main>
</body>
</html>