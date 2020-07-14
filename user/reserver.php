<?php
try{
// connexion à la base de données registration
$db = new PDO('mysql:host=localhost;dbname=registration;charset=utf8',
'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on quitte la page
die('Erreur : '.$e->getMessage());
}

//affichage de utilisateurs
$nom = $_POST[]
$reponse = $db->query('SELECT * FROM room where etat = 0');

header('location:index.php');
exit();
?>