<style>/* Global styling */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body styling */
body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  color: #333;
  background-color: #f4f4f4;
  background-image: url(image/imgback.jpg);
  background-repeat: no-repeat;
  background: cover;
  background-size: cover;
}
/* Navigation bar styling */
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
/* Form styling */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

div {
    margin-bottom: 15px;
}

label {
    display: inline-block;
    width: 120px;
    text-align: right;
    color: #333;
}

input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
    width: 250px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 1em;
}

input[type="submit"] {
    display: block;
    margin: 20px auto;
    background-color: #30465c;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
    border: none;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0080ff;
}

/* Button styling */
button {
    display: block;
    margin: 20px auto;
    padding: 12px 24px;
    color: #000;
    background-color: #fff;
    border: none;
    border-radius: 90px;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background-color: #2388b8;
    transform: scale(1.1);
    color: #fff;
}

button:active {
    background-color: #f0f0f0;
}
</style>
<script src="inscription.js"></script>
<div class="an">
    <ul>
    
      <li><a href="home.php">HOME</a></li>
      <li><a href="login.php">Login</a></a></li>
      <li><a href="about.php">ABOUT TALA</a></li>
      <li><a href="inscription.php">INSCRIPTION</a></li>
  
    </ul>
    </div>
<form method="post" action="connect.php":>
  
    <h2>Inscription d'utilisateur</h2>
    <div>

      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required><br>
      <span id="error"></span>
    </div>
    <div>
        
      <label for="username">nom utilisateur:</label>
      <input type="text" id="username" name="username" required><br>
      <span id="error"></span>
    </div>
    <div>
      <label for="prenom">Prenom :</label>
      <input type="text" id="prenom" name="prenom" required>
    </div>
    <div>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div>
     
    <div class="button">
      <button type="submit">Inscription</button>
    </div>
  </form>