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

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profil</title>
        <link rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body>

        <main>
            <section>
                <section>
                    <h1>Infos Profil</h1>
                    <form  action="" method="post" enctype="multipart/form-data">

                    	<?php
                    		if (!empty($resultatInfosProfil['avatar'])) 
                    		{ ?>

                    		<img src="avatar/<?php echo $resultatInfosProfil['avatar'] ?>" width="200" ><br><br>
                    	<?php
                    		}
                    	?>

                        

                    	<label> Pseudo </label><br>
	                    <input type="text" name="login" placeholder="<?php echo $resultatInfosProfil['login']; ?>"><br>

	                    <label> Votre mot de passe </label><br>
	                    <input type="password" name="password"><br>

	                    <label> Confirmez votre mot de passe </label><br>
	                    <input type="password" name="passwordcon"><br>

	                    <label>Avatar </label><br>
	                    <input type="file" name="avatar"><br>
	                   
	                    <input type="submit" value="Modifier" name="modifier" /><br>
                    </form>  
                    <?php
                    updateUser();

                    ?>
                </section>
                
            </section>
          
            

            <?php 

                               	
            ?>
        </main>
	</body>
</html>