<?php
session_start();
include('fonctions.php');
require("templates/header2.php"); ?>

    <main id="mainConIns">
        <section id="mainConIns">
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

    <?php require("templates/footer.phtml")  ?>