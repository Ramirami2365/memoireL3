<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: right;
    }
  </style>
</head>
<div class="an">
  <ul>
    <li><a href="home.php">HOME</a></li>
    <li><a href="Traiter.php">Traiter</a></a></li>
    <li><a href="about.php">ABOUT TALA</a></li>
    <li><a href="inscription.php">INSCRIPTION</a></li>
  
  </ul>
  </div>
  
  <h1>Traitement automatique de fichiers en arabe</h1><br>
  <br>
<head>
  <meta charset="utf-8">
  
  <style>
    body {
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    #title{
   text-align: center;
   font-family: cursive;
   color: rgb(0, 0, 0);
     }
   .bu{
    margin-left: 50px;
    margin-bottom: 10px;
    
   }
    .ll{
    color: rgb(7, 8, 8);
    text-align: center;
    margin-bottom: 10px;
    
    }

    #container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: blue;
    }

    h4 {
      text-align: center;
      color: #0974cc;
    }

    input[type="file"] {
      display: block;
      margin: 0 auto;
      margin-bottom: 10px;
    }

    button {
      display: block;
      margin: 0 auto;
      padding: 10px 20px;
      color: #000000;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .bu{
    margin-left: 50px;
    margin-bottom: 10px;
    
    }
    .par1{
    border-style: solid;
    padding: 30px;
   
    
    }
    .par1 p{
    text-align: center;
     font-family: cursive;
     color: #030303;
   }
    *{
    padding: 0%;
    margin: 0%;
    }

    
    
    button:hover {
    background-color: #2388b8; /* Changement de couleur de fond au survol */
    }

    button:active {
    background-color: #f0f0f0; /* Changement de couleur de fond au clic */
    }
    button {
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Ombre */
    transition: box-shadow 0.3s ease; /* Transition douce */
   }
   button:hover {
    cursor: pointer; /* Curseur en forme de main au survol */
    }
   button {
    transition: transform 0.3s ease; /* Transition douce */
    }  

   button:hover {
    transform: scale(1.1); /* Agrandissement au survol */
    }
    button {
    border: none; /* Suppression de la bordure par défaut */
    border-radius: 90px; /* Arrondi des coins */
    outline: none; /* Suppression du contour au clic */
    }
    button {
    font-size: 15px; /* Augmenter la taille du texte */
    padding: 12px 24px; /* Augmenter l'espace intérieur (padding) du bouton */
       }


       table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

      th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: right;
    }

       th {
      background-color: #f2f2f2;
    }

        tr:nth-child(even) {
      background-color: #f9f9f9;
    }

         tr:hover {
      background-color: #f2f2f2;
    }
    
    .an {
  display: flex;
  background-image: linear-gradient(rgb(0, 183, 255), rgb(0, 26, 128));
  height: 80px;
  border-style: solid;
  margin-top: 10px;
}

.an ul {
  margin-left: 40px;
  margin-right: 40px;
  margin-top: -10px;
}

.an ul li {
  text-align: center;
  display: inline-block;
  width: 130px;
  margin-top: 30px;
  margin-left: 94px;
  padding: 7px;
  background-color: #fff;
  border-radius: 12.5px;
  transition: 0.4s ease;
}

.an ul li a {
  font-family: Verdana;
  color: rgb(0, 0, 0);
  font-weight: bold;
  text-decoration: none;
}

.an ul li a:hover {
  color: white;
}

.an ul li:hover {
  padding: 7px;
  border-radius: 12.5px;
  background: rgb(44, 190, 183);
  color: rgb(255, 255, 255);
}
body{
            background-image: url(image/img10.jpg);
            background: cover;
            background-repeat: no-repeat;
            background-size:cover;
  }

</style>
<?php
// Liste des prépositions à éliminer
$prepositions = ["من", "إلى", "عن", "على", "في", "ب", "ل", "ك", "و", "بين", "مع", "عند", "قبل", "بعد", "خلال", "حتى", "أو", "إلا", "لكن", "رغم", "إذا", "لو", "كي", "أن", "كأن", "لأن", "ليس", "ما", "ماذا", "هل", "منذ", "ذلك", "هذا", "هذه", "ذا", "ذي", "ذو", "الذي", "التي", "اللذان", "اللتان", "الذين", "اللاتي", "اللائي", "فهي","غير"];

// Seuil de fréquence minimale
$threshold = 10;

 // Indicateur de succès de traitement de fichier
$fileProcessed = false; 


// Fonction pour supprimer les balises HTML d'une chaîne de caractères
function removeHTMLTags($text) {
    return strip_tags($text);
}

// Fonction pour compter la fréquence des mots dans un texte
function countWords($text, $prepositions, $threshold) {
    // Supprimer les balises HTML
    $text = removeHTMLTags($text);
    // Supprimer les signes de ponctuation
    $text = preg_replace("/[.,;:!?،؛؟]/u", "", $text);
    // Séparer les mots par un espace
    $words = explode(" ", $text);
    // Créer un tableau pour stocker les mots et leurs fréquences
    $wordCounts = [];
    // Parcourir les mots
    foreach ($words as $word) {
        // Vérifier si le mot est une préposition ou est vide
        if (in_array($word, $prepositions) || trim($word) === "") {
            // Ignorer le mot
            continue;
        }
        // Vérifier si le mot existe déjà dans le tableau
        if (array_key_exists($word, $wordCounts)) {
            // Augmenter sa fréquence
            $wordCounts[$word]++;
        } else {
            // Ajouter le mot avec une fréquence initiale de 1
            $wordCounts[$word] = 1;
        }
    }
    // Filtrer les mots en dessous du seuil
    foreach ($wordCounts as $word => $count) {
        if ($count < $threshold) {
            unset($wordCounts[$word]);
        }
    }
    return $wordCounts;
}

// Fonction pour créer un tableau HTML à partir d'un tableau de mots et de fréquences
function createTable($wordCounts, $fileName) {
    // Calculer le nombre total de mots
    $totalWords = array_sum($wordCounts);
    // Créer le tableau HTML
    $html = "<table border='1'>";
    $html .= "<thead><tr><th>Mot</th><th>Fréquence</th><th>Moyenne</th><th>Nom du fichier</th></tr></thead>";
    $html .= "<tbody>";
    foreach ($wordCounts as $word => $count) {
        $moyenne = number_format($count / $totalWords, 2);
        $html .= "<tr><td>$word</td><td>$count</td><td>$moyenne</td><td>$fileName</td></tr>";
    }
    $html .= "</tbody></table>";
    return $html;
}

// Fonction pour extraire uniquement le texte arabe du contenu HTML
function extractArabicText($htmlContent) {
    preg_match_all("/[\x{0600}-\x{06FF}\s]+/u", $htmlContent, $matches);
    return implode(" ", $matches[0]);
}

// Fonction pour sauvegarder les données dans la table annotation
function saveToDatabase($wordCounts, $fileName, $conn) {
    // Préparer la requête SQL
    $stmt = $conn->prepare("INSERT INTO annotation (motcle, frequence, moyenne, file_name) VALUES (?, ?, ?, ?)");
    $totalWords = array_sum($wordCounts);
    foreach ($wordCounts as $word => $count) {
        $average = $count / $totalWords;
        $stmt->bind_param("sids", $word, $count, $average, $fileName);
        $stmt->execute();
    }
    $stmt->close();
}

// Fonction pour rechercher des mots dans la base de données
function searchWord($word, $conn) {
    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT motcle, frequence, moyenne, file_name FROM annotation WHERE motcle = ?");
    $stmt->bind_param("s", $word);
    $stmt->execute();
    $result = $stmt->get_result();


// Créer le tableau HTML pour afficher les résultats de la recherche
    if ($result->num_rows > 0) {
        $html = "<table border='1'>";
        $html .= "<thead><tr><th>Mot</th><th>Fréquence</th><th>Moyenne</th><th>Nom du fichier</th><th>Action</th></tr></thead>";
        $html .= "<tbody>";
        while ($row = $result->fetch_assoc()) {
            $html .= "<tr><td>{$row['motcle']}</td><td>{$row['frequence']}</td><td>{$row['moyenne']}</td><td>{$row['file_name']}</td>";
            $html .= "<td><a href='?view_annotations={$row['file_name']}'>Voir les annotations</a></td></tr>";
        }
        $html .= "</tbody></table>";
    } else {
        $html = "Aucun résultat trouvé pour '$word'.";
    }

    $stmt->close();
    return $html;
}

// Fonction pour sauvegarder les informations du fichier dans la table file
function saveFileInfo($fileName, $filePath, $conn) {
    $stmt = $conn->prepare("INSERT INTO file (name, path) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $filePath);
    $stmt->execute();
    $stmt->close();
}

// Fonction pour obtenir tous les noms de fichiers
function getAllFileNames($conn) {
    $stmt = $conn->prepare("SELECT name FROM file");
    $stmt->execute();
    $result = $stmt->get_result();
    $fileNames = [];
    while ($row = $result->fetch_assoc()) {
        $fileNames[] = $row['name'];
    }
    $stmt->close();
    return $fileNames;
}

// Fonction pour supprimer un fichier de la base de données
function deleteFile($fileName, $conn) {
    $stmt = $conn->prepare("DELETE FROM file WHERE name = ?");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->close();

    // Supprimer les annotations liées au fichier
    $stmt = $conn->prepare("DELETE FROM annotation WHERE file_name = ?");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->close();
}

// Fonction pour afficher toutes les annotations d'un fichier
function viewAnnotations($fileName, $conn) {
    $stmt = $conn->prepare("SELECT motcle, frequence, moyenne FROM annotation WHERE file_name = ?");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $result = $stmt->get_result();

    // Récupérer les résultats dans un tableau
    $annotations = [];
    while ($row = $result->fetch_assoc()) {
        $annotations[] = $row;
    }

    

    // Créer le tableau HTML pour afficher les annotations
    if (count($annotations) > 0) {
        $html = "<h3>Annotations pour le fichier: $fileName</h3>";
        $html .= "<table border='1'>";
        $html .= "<thead><tr><th>Mot</th><th>Fréquence</th><th>Moyenne</th></tr></thead>";
        $html .= "<tbody>";
        foreach ($annotations as $row) {
            $html .= "<tr><td>{$row['motcle']}</td><td>{$row['frequence']}</td><td>{$row['moyenne']}</td></tr>";
        }
        $html .= "</tbody></table>";
    } else {
        $html = "Aucune annotation trouvée pour '$fileName'.";
    }

    $stmt->close();
    return $html;
}


// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "tala");
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Formulaire de recherche
echo "<form method='get'>";
echo "<input type='text' name='search' placeholder='Rechercher un mot...' />";
echo "<button type='submit'>Rechercher</button>";
echo "</form>";

// Div pour afficher les résultats de la recherche
echo "<div id='searchResults'></div>";

// Afficher le formulaire de téléversement
echo "<form method='post' enctype='multipart/form-data'>";
echo "<input type='file' name='file' />";
echo "<button type='submit'>Traiter</button>";
echo "</form>";

// Vérifier si une recherche est soumise via le formulaire
if (isset($_GET['search'])) {
    $searchWord = $_GET['search'];
    // Rechercher le mot et afficher les résultats dans la div searchResults
    $searchResults = searchWord($searchWord, $conn);
    echo "<script>document.getElementById('searchResults').innerHTML = " . json_encode($searchResults) . ";</script>";
}


// Vérifier si l'utilisateur a cliqué sur "Voir les annotations"
if (isset($_GET['view_annotations'])) {
    $fileName = $_GET['view_annotations'];
    // Afficher toutes les annotations du fichier
    echo viewAnnotations($fileName, $conn);
}

echo "<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f5f5f5;
    }
    form {
        margin-bottom: 20px;
    }
    input[type='text'], input[type='file'] {
        padding: 10px;
        margin: 5px 0 30px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: calc(30% - 11px); /* Réduire la largeur */
        text-align: center;
        display: flex;
    }
    button {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        margin top: 20px;
        margin-left: 0; /* Aligner à gauche */
        display: block; /* Assurez-vous que le bouton prend une ligne entière */
    }
    button:hover {
        background-color: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .no-result {
        color: red;
        font-weight: bold;
        margin-top: 20px;
    }
    form#deleteForm select {
        width: calc(30% - 22px); /* Réduire la largeur */
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin: 5px 0 30px 0;
    }
    form#deleteForm button {
        display: block;
        width: calc(10% - 20px); /* Réduire la largeur pour correspondre aux autres champs */
    }
</style>";

// Vérifier si un fichier est soumis via un formulaire ( choisir un fichier)
if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name']; // Récupérer le chemin temporaire de fichier téléverser  
    $fileName = $_FILES['file']['name']; // Récupérer le nom du fichier téléversé
    $filePath = 'uploads/' . $fileName; // Définir le chemin du fichier
    if (move_uploaded_file($file, $filePath)) { // Déplacer le fichier téléversé vers le dossier de destination
        $htmlContent = file_get_contents($filePath);// Lecture du contenu HTML du fichier téléversé.
        // Extraire le texte arabe du contenu HTML
        $arabicText = extractArabicText($htmlContent);
        // Compter les mots et leurs fréquences
        $wordCounts = countWords($arabicText, $prepositions, $threshold);
        // Créer un tableau HTML
        $table = createTable($wordCounts, $fileName);
        echo $table;

        // Sauvegarder les données dans la table annotation
        saveToDatabase($wordCounts, $fileName, $conn);
        // Sauvegarder les informations du fichier dans la table file
        saveFileInfo($fileName, $filePath, $conn);
        // Indiquer que le fichier a été traité avec succès
          $fileProcessed = true;
    } else {
        echo "Échec du téléversement du fichier.";
    }
}

// Afficher le formulaire de suppression
$fileNames = getAllFileNames($conn);//Appel à une fonction qui récupère tous les noms de fichiers à partir de la base de données
echo "<form id='deleteForm' method='get'>";
echo "<select name='delete'>";
foreach ($fileNames as $fileName) {
    echo "<option value='$fileName'>$fileName</option>";// barre de choix contient tout les nom de fichier 
}
echo "</select>";
echo "<button type='submit' onclick='return confirmDelete()'>Supprimer</button>";
echo "</form>";


// JavaScript pour effectuer la redirection après avoir cliqué sur le bouton de suppression
echo "<script>
function confirmDelete() {
    var fileName = document.querySelector('select[name=\"delete\"]').value;
    if (confirm('Voulez-vous vraiment supprimer le fichier ' + fileName + ' ?')) {
        window.location.href = '" . $_SERVER['PHP_SELF'] . "?delete=' + fileName;
        return true;
    } else {
        return false;
    }
}
</script>";

// Vérifier si un fichier est à supprimer
if (isset($_GET['delete'])) {
    $deleteFile = $_GET['delete'];
    // Supprimer le fichier et rafraîchir la page
    deleteFile($deleteFile, $conn);
    
    exit;
}
// Ajouter le script pour afficher l'alerte si le fichier est traité avec succès
if ($fileProcessed) {
    echo "<script>alert('Votre fichier est sauvegardé avec succès');</script>";
}

// Fermer la connexion à la base de données
$conn->close();
?>

</body>
</html>