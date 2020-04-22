<?php
session_start();
include('fonctions.php');
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Connexion</title>
	    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <header>
    </header>
    <main id="mainConIns">
        <section>
			<div id="conInsSection">
				<h1 id="h1CoIn">Connexion</h1>
				<form action="" method="post" ><br />
					<div>
                        Login : <br /><br><input type="text" name="login" required><br /><br>
						Password : <br /><br><input type="password" name="password" required><br /><br>
                        <input  type="submit" name="valider" value="Connexion">
                    </div>
                    <?php connexion(); ?>
                </form>
            </div>
        </section>
    </main>
    <footer>
    </footer>
    </body>
</html>
    
                    