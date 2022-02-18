<?php

  session_start();
  include "dbconnect.php";

//if(  isset($_POST['sexe']) && isset($_POST['date']) && isset($_POST['pays'])  && isset($_POST['password'])){
 
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $sexe=$_POST['sexe'];
    $date=$_POST['date'];
    $pays=$_POST['pays'];
    $tel=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $ville=$_POST['ville'];
 
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO utilisateurs (Nom_user,Prenom_user,Email,Password,Sexe,Date_naissance,Pays,Ville,Num_tel)
VALUES ('$nom','$prenom','$email','$password','$sexe','$date','$pays','$ville','$tel')";
 
$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='Login.html'</script>";
?>
        
    
    
