<?php
session_start();
include('fonctions.php');
?>


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
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php


	?>
	<main id="mainConnexion">
		<section>
			<div>
				<div>CONNEXION</div><br />
				<div>
					<form action="" method="post"><br />

						Login : <br /><input type="text" name="login" required><br />
						Password : <br /><input type="password" name="password" required><br />


					</div>
					<div>
						<input  type="submit" name="valider" value="Connexion">
					</div>

					<?php
					connexion();
					?>
				</form>

			</div>
		</section>

	</main>
	<?php
	

	?>
</body>
</html>
