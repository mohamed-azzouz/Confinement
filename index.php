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
		<button><a href="disconnect.php">DECO</a></button><br><br><br><br>

		<?php

		$re = "SELECT * FROM salon";
		$query = mysqli_query($connexion, $re);
		$result = mysqli_fetch_all($query);

		$nbSalon = count($result);

		$i = 0;
		while($i != $nbSalon)
		{?>
			<a href="salon.php?id=<?php echo $result[$i][0]?>"><?php echo $result[$i][2]; ?></a><br>
		<?php
			$i++;
		}
		?>
	</main>
</body>
</html>