
<?php 
error_reporting(0);
ini_set('display_errors', 0);
$link = mysqli_connect("localhost", "root", "", "registration"); 
  
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
} 
echo "
<form method='GET' action='update-process.php'>
<table>
<tr>
	<td><input type='text' placeholder='id' name='id'></td>

</tr>
<tr>
	<td><input type='text' name='prix' placeholder='prix de chambre ' </td>
</tr>
<tr>
	<td><input type='text' name='numtelc' placeholder=' numero de tel de chambre' </td>
</tr>
<tr>
	<td><input type='submit' value='update' </td>
</tr>
</table>
</form>";
  
$sql = "UPDATE room SET id='$_GET[id]', prix='$_GET[prix]',phone='$_GET[numtelc]' WHERE id='$_GET[id]'"; 
if(mysqli_query($link, $sql)){ 
    echo "Record was updated successfully."; 
} 
                    

mysqli_close($link); 
?> 

