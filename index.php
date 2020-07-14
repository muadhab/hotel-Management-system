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
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  $request = "SELECT role FROM `users` WHERE username='$username'";
  $role = mysqli_query($conn,$request) or die(mysql_error());

  if($rows==1){
      $_SESSION['username'] = $username;
      if ($role == '0'){
        header("Location: /x/admin/index.php");
      }
      else {
        header("Location: /x/user/index.php");
      }
      
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
</body><center>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
<form class="box" action="" method="post" name="login" align="center">

<table align="center">
  <tr>
    <h1 class="box-title">S'inscrire</h1>
    <td>
      <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
    </td>

  </tr>
  <tr>
    <td><input type="password" class="box-input" name="password" placeholder="Mot de passe"></td>
  </tr>
  <tr>
    <td><input type="submit" value="Connexion " name="submit" class="box-button"></td>
  </tr>
  <tr>
    <td>
      <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
    </td>
    <?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
  </tr>
</table>

</form></center></div></div></div>
</body>
</html>