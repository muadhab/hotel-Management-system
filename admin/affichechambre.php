
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

$reponse = $db->query('SELECT * FROM room');
if ( !$reponse)
{
echo "Lecture impossible !";
}
else
{
echo "<table class=\"tab\" ><tr><th> numero Chambre </th><th> prix de chambre </th><th> numero tel de chambre </th><th> etat de chambre </th><th> owner id </th></tr>";
while ($entree = $reponse->fetch())
{
echo"

<tr><td>".$entree['id'].
"</td><td>".$entree['prix'].
"</td><td>".$entree['phone'].
"</td><td>".$entree['etat'].
"</td><td>".$entree['ownerid'].
"</td><td><a href='update-process.php?id=".$entree['id']."'><input type='button' value='update' style='backgroud-color: Green;'></a></td>
<td><a href='delete.php?id=".$entree['id']."'><input type='button' value='delete'></a></td></tr>

";
}
echo"</table>";
$reponse->closeCursor();
}
//

?>