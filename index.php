<?php

session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$bddName = 'confinement';

$connexion = mysqli_connect($servername, $username, $password, $bddName);

include('fonction.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
	<main>
		HELLO
	</main>
</body>
</html>