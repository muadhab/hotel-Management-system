<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
<center>
<form class="box" action="" method="post">
  <table>
  	<h1 class="box-title">S'inscrire</h1>
  	<tr>
  		<td><input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required /></td>
  	</tr>
  	<tr>
  		<td><input type="text" class="box-input" name="email" placeholder="Email" required /></td>
  	</tr>
  	<tr>
  		<td><input type="password" class="box-input" name="password" placeholder="Mot de passe" required /></td>
  	</tr>
  	<tr>
  		<td><input type="submit" name="submit" value="S'inscrire" class="box-button" /><br><p class="box-register">Déjà inscrit? <a href="index.php">Connectez-vous ici</a></p></td>
  	</tr>
  </table>
    
  
    
    
    
    
</form></div></div></div></center>
<?php } ?>
</body>
</html>