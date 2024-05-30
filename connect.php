<!DOCTYPE html>
<html>
<head>
	<style>
		body {
    background-image: url(image/imgback.jpg);
	background-repeat: no-repeat;
  background: cover;
  background-size: cover;
}
  
  h1 {
    padding-bottom: 60px;
    text-align: center;
    color: rgb(6, 10, 240);
  }
  h3{
    color: rgb(3, 2, 14);
    padding-left: 150px;
    padding-bottom: 40px;
  }
  form {
  max-width: 600px;
  margin: 70px auto; /* Centre le formulaire horizontalement avec des marges automatiques */
  padding: 40px;
  background-color: #ffffff;
  border-radius: 5px;
}



	</style>
</head>
<body>
<form method="post" action="connect.php":>
<?php
require('config.php');
if (isset($_POST['username'], $_POST['nom'], $_POST['prenom'], $_POST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer le nom et supprimer les antislashes ajoutés par le formulaire
	$nom = stripslashes($_POST['nom']);
	$nom = mysqli_real_escape_string($conn, $nom);
	// récupérer le prenom et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_POST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom);
	// récupérer l'adresse et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	
    $query = "INSERT into `user` ( username, nom, prenom, motdpass)
              VALUES ('$username', '$nom','$prenom','$password')";
			 
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h1>Vous êtes inscrit avec succès.</h1>
             <h3>Cliquez ici pour vous
             <a href='login.php'>connecter</a></h3>
			 </div>";
    }
	else{echo "erreur";}
}
?>	
</form>
</body>