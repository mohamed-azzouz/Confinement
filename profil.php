<?php 

session_start();
include('fonctions.php');

$connexion = mysqli_connect("Localhost", "root", "", "confinement") ;
if (isset($_GET['id'])) 
{
    $requeteInfosProfil = "SELECT * FROM utilisateurs WHERE id = '".$_GET['id']."'";
    $queryInfosProfil = mysqli_query($connexion, $requeteInfosProfil) ;
    $resultatInfosProfil = mysqli_fetch_assoc($queryInfosProfil);   
}
else
{
    $requeteInfosProfil = "SELECT * FROM utilisateurs WHERE id = '".$_SESSION['id']."'";
    $queryInfosProfil = mysqli_query($connexion, $requeteInfosProfil);
    $resultatInfosProfil = mysqli_fetch_assoc($queryInfosProfil);   
}

require("templates/header2.php"); ?>

        <main id="mainConIns">
        <section id="conInsSection">
            <section>
                <h1 id="h1CoIn">Infos Profil</h1>
                <form  action="" method="post" enctype="multipart/form-data">
                    	<?php
                    		if (!empty($resultatInfosProfil['avatar'])) 
                    		{ ?>
                    		<img src="avatar/<?php echo $resultatInfosProfil['avatar'] ?>" width="200" ><br><br>
                    	<?php
                    		}
                    	?>

                    	<label> Pseudo </label><br><br>
	                    <input type="text" name="login" placeholder="<?php echo $resultatInfosProfil['login']; ?>"><br><br>

	                    <label> Votre mot de passe </label><br><br>
	                    <input type="password" name="password"><br><br>

	                    <label> Confirmez votre mot de passe </label><br><br>
	                    <input type="password" name="passwordcon"><br><br>

	                    <label>Avatar </label><br><br>
	                    <input type="file" name="avatar"><br><br>
	                   
	                    <input type="submit" value="Modifier" name="modifier" /><br>
                    </form>  
                    <?php updateUser(); ?>
                </section>
            </section>
        </main>
        <?php require("templates/footer.phtml")  ?>