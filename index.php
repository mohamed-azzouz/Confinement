<?php

session_start();

require("templates/header1.phtml"); ?>

	<main id="main-index">
		<div id="main-div">
			<section id="sec1-index">
				<form action="" method="post" id="form-index">
					<button type="submit" id="but-crea-sal">Créer un salon</button>
				</form>
				<img src="img/serjuani2.png" alt="youtube" id="yout-img">
			</section>
		</div>
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

<?php require("templates/footer.phtml") 





?>