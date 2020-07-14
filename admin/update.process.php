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


if(count($_POST)>0) {
mysqli_query($conn,"UPDATE room set id='" . $_POST['idc'] . "', prix='" . $_POST['prixc'] . "', phone='" . $_POST['numtelc'] . "' WHERE id='" . $_POST['idc'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM room WHERE id='" . $_GET['idc'] . "'");
$entreex= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update room Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="retrieve.php">Employee List</a>
</div>
numero chambre <br>
<input type="hidden" name="idc" class="txtField" value="<?php echo $entree['id']; ?>">
<input type="text" name="idc"  value="<?php echo $row['id']; ?>">
<br>
prix chambre <br>
<input type="text" name="prixc" class="txtField" value="<?php echo $entree['prix']; ?>">
<br>
numero tel de chambre<br>
<input type="text" name="numtelc" class="txtField" value="<?php echo $entree['phone']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>