<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['valider'])) {
  // receive all input values from the form
  $numc = mysqli_real_escape_string($db, $_POST['numc']);
  $prixc = mysqli_real_escape_string($db, $_POST['prixc']);
  $numtelc = mysqli_real_escape_string($db, $_POST['numtelc']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($numc)) { array_push($errors, "numero de chambre demandé"); }
  if (empty($prixc)) { array_push($errors, "prix de chambre est demandé"); }
  if (empty($numtelc)) { array_push($errors, "numéro telephone de chambre est démandé"); }


    $query = "INSERT INTO room (id, prix, phone) 
          VALUES('$numc', '$prixc', '$numtelc')";
    mysqli_query($db, $query);
   
    header('location: index.php');
  



}

?>