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
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	

	?>
	<main id="mainInscription">
		<section>
			
			<div>
				<div>INSCRIPTION</div>
				<form action="" method="post" ><br />

					<div>
						Login :<br /> <input type="text" name="login" required><br />
						Mot de Passe :<br /><input type="password" name="password" required><br />
						Confirmation Mot de Passe : <br /><input type="password" name="confirmpassword" required><br />
					</div>
					<div>
						<input type="submit" name="valider" value="Inscription">
					</div>

				</form>
				<?phps
				inscription();
				?>
			</div>
		</section>
	</main>
	<?php
	

	?>
</body>
</html>

