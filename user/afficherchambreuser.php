

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

$reponse = $db->query('SELECT * FROM room where etat = 0');
if ( !$reponse)
{
echo "Lecture impossible !";
}
else
{
echo "
<table class=\"tab\" width='70' style='assets/css/demo.css'>
<tr>
	<td> numero Chambre </td>
	<td></td>
	<td> prix de chambre </td>
	<td></td>
	<td> numero tel de chambre </td>
</tr>";
while ($entree = $reponse->fetch())
{
echo"

<tr><td>".$entree['id'].

"</td>
<td></td>
<td>".$entree['prix'].

"</td>
<td></td>
<td>".$entree['phone'].

"</td><td><a href='#'>
<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#exampleModalCenter'>
  Launch demo modal
</button>

<form name='f' mathode='POST'>

<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>Réservation</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
       
        <table align='center'>
        	<tr>	
        		<td>Nom</td>
        		<td><input type='text' name='nomres' placeholder='nom de reservation'</td>
        		
        	</tr>
        	<tr>
        		<td>date arrivé	</td>
        		<td><input type='date' name='datedeb' placeholder='date arrivé'</td>
        	</tr>
        	<tr>
        		<td>date sortie	</td>
        		<td><input type='date' name='datesort' placeholder='date sortie'</td>
        	</tr>

        	

        </table>
          
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <a href='reserver.php?id=".$entree['id']."><button type='button' class='btn btn-primary'>Reserver</button></a>
      </div>
    </div>
  </div>
</div>
</form>
</a>
</td>
</tr>

";
}
echo"</table>";
$reponse->closeCursor();
}
//

?>