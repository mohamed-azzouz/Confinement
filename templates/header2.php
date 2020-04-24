<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
            <header id="header1-index">
                <div id="div-for-headnav">
                    <nav id="header1-nav">
                        <h1 id="header1-title1"><a id="logoLien" href="index.php">Covidéo-19</a></h1>
                        <ul id="header1-ul">
                            <?php if(isset($_SESSION["login"])): ?>
                                <li class="header-li"><a href="profil.php" class="header1-lien">Profil</a></li>
                                <li class="header-li"><a href="listesalons.php" class="header1-lien">Liste des salons</a></li>
                                <li class="header-li"><a href="index.php?destroy=die" class="header1-lien">Déconnexion(<?=$_SESSION["login"] ?>)</a></li>
                            <?php else: ?>
                                <li class="header-li"><a href="#" class="header1-lien" onClick="AfficherMasquerSign()">Inscription</a></li>
                                <li class="header-li"><a href="#" class="header1-lien" onClick="AfficherMasquerCo()">Connexion</a></li>
                            <?php endif; ?>     
                        </ul>
                    </nav>
                </div>
            </header>