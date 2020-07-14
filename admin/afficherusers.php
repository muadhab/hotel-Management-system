 
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

$reponse = $db->query('SELECT * FROM users');
if ( !$reponse)
{
echo "Lecture impossible !";
}
else
{
echo "<table class=\"tab\" ><tr><th> id </th><th> username </th><th> email </th><th> Password </th></tr>";
while ($entree = $reponse->fetch())
{
echo"<tr><td>".$entree['id'].
"</td><td>".$entree['username'].
"</td><td>".$entree['email'].
"</td><td>".$entree['password'].
"</td><td><input type='button' value='delete'></td></tr>";
}
echo"</table>";
$reponse->closeCursor();
}

?>