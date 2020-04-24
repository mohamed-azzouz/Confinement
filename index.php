<?php

session_start();

require("fonctions.php");
require("templates/header1.phtml"); ?>

	<main id="main-index">
		<div id="main-div">
			<section id="sec1-index">
				<form action="" method="post" id="form-index">
					<input type="button" id="but-crea-sal" value="Créer un salon" onClick="AfficherMasquer()">
				</form>
				<img src="img/serjuani2.png" alt="youtube" id="yout-img">
			</section>
		</div>

		<form action="" method="post" id="formsign-hidden" style="display:none";>
			<label for="login">Nom de compte</label>
			<input type="text" name="login" class="inpsize" required>
			<label for="password">Mot de passe</label>
			<input type="password" name="password" class="inpsize" required>
			<label for="confirmpassword">Confirmation du mot de passe</label>
			<input type="password" name="confirmpassword" class="inpsize" required>
			<input type="submit" name="sub" value="Inscription" class="inpsub-cosign">
			<?php inscription(); ?>
		</form>

		<form action="" method="post" id="formco-hidden" style="display:none";>
			<label for="login">Nom de compte</label>
			<input type="text" name="login" class="inpsize" required>
			<label for="password">Mot de passe</label>
			<input type="password" name="password" class="inpsize" required>
            <input type="submit" name="co" value="Connexion" class="inpsub-cosign">
            <?php connexion(); ?>
		</form>
		
		<form action="" method="post" id="form-hidden" style="display:none";>
		<?php if(isset($_SESSION["login"])): ?>
			<h2 id="creh2-title">Création du salon</h2>
			<div id="nameSalon">
				<label for="nameSalon">Nom du salon</label>
				<input type="text" name="nameSalon" id="inp-namesal">
			</div>
			<input type="submit" id="addSalon" name="addSalon" value="Créer">
			<?php addSalon(); ?>
		<?php else:
			$erreur = "Connectez vous pour avoir accès a ce formulaire";
		endif;
			if(isset($erreur)): ?>
				<div id="create-error"><?php echo $erreur; ?></div>
			<?php endif; ?>
		</form>

		<article id="article-index">
			<h2 id="index-title2">Les fonctionnalités de Covidéo-19</h2>
			<div id="box-index-para">
				<p>- Un lecteur synchronisé pour l'audio et la vidéo.</p>
				<p>- Parler avec vos amis dans des salons grâce au chat intégré.</p>
				<p>- Profiter du contenu de YouTube avec vos amis.</p>
			</div>
		</article>
	</main>
</div>
<script type="text/javascript">

	function AfficherMasquer(){
		divInfo = document.getElementById('form-hidden');
		if(divInfo.style.display == 'none'){
		divInfo.style.display = "flex";
		} else {
			divInfo.style.display = "none";
		}
	}
	function AfficherMasquerSign(){
		divInfo = document.getElementById('formsign-hidden');
		if(divInfo.style.display == 'none'){
		divInfo.style.display = "flex";
		} else {
			divInfo.style.display = "none";
		}
	}
	function AfficherMasquerCo(){
		divInfo = document.getElementById('formco-hidden');
		if(divInfo.style.display == 'none'){
		divInfo.style.display = "flex";
		} else {
			divInfo.style.display = "none";
		}
	}
</script>
<?php require("templates/footer.phtml") 





?>