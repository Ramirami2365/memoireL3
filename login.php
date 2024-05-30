<?php
require('config.php');


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier l'existence de l'utilisateur
    $sql = "SELECT * FROM user WHERE username = '$username' AND motdpass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur existe, authentification réussie
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: Traiter.php"); // Rediriger vers la page de bienvenue après la connexion
    } else {
        // L'utilisateur n'existe pas ou les informations d'identification sont incorrectes
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
   <style>
 * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

/* Styles pour le corps de la page */
body {
  background-image: url(image/imgback.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-family: 'Arial', sans-serif;
  margin: 0;
}



/* Styles pour la boîte */
.box {
  border: 1px solid rgb(173, 216, 230); /* Light blue */
  padding: 30px 25px 10px 25px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 360px;
  width: 100%;
}

/* Styles pour le titre de la boîte */
.box-title {
  color: black /* Light blue */
  background: rgb(240, 248, 255); /* AliceBlue */
  font-family: cursive; /* Harmonisé avec les polices précédentes */
  font-weight: 400;
  padding: 15px 25px;
  line-height: 30px;
  font-size: 22px;
  margin: -30px -30px 30px;
  border-radius: 10px 10px 0 0;
}

/* Styles pour les champs de saisie de la boîte */
.box-input {
  font-size: 14px;
  background: #fff;
  border: 1px solid #ddd;
  margin-bottom: 25px;
  padding-left: 10px;
  border-radius: 5px;
  width: calc(100% - 20px);
  height: 50px;
  box-sizing: border-box;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.box-input:focus {
  outline: none;
  border-color: rgb(173, 216, 230); /* Light blue */
  box-shadow: 0 0 5px rgba(173, 216, 230, 0.5); /* Light blue shadow */
}

/* Styles pour le bouton de la boîte */
.box-button {
  border-radius: 5px;
  background: rgb(70, 130, 180); /* SteelBlue */
  text-align: center;
  cursor: pointer;
  font-size: 19px;
  width: 100%;
  height: 51px;
  padding: 0;
  color: #fff;
  border: 0;
  outline: 0;
  transition: background 0.3s ease;
}

.box-button:hover {
  background: rgb(65, 105, 225); /* RoyalBlue */
}

/* Styles pour le message d'erreur */
.errorMessage {
  background-color: rgb(240, 128, 128); /* LightCoral */
  border: rgb(178, 34, 34) 1px solid; /* FireBrick */
  padding: 5px 10px;
  color: #FFFFFF;
  border-radius: 3px;
  font-size: 14px;
  margin-bottom: 20px;
}



   </style>
</head>
<body>
    <div class="box">
        <h2 class="box-title">Connexion</h2>
        <?php if(isset($error_message)) { ?>
            <p class="errorMessage"><?php echo $error_message; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">Nom d'utilisateur :</label><br>
            <input type="text" class="box-input" id="username" name="username"><br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" class="box-input" id="password" name="password"><br><br>
            <input type="submit" class="box-button" value="Connexion">
        </form>
    </div>
</body>
</html>