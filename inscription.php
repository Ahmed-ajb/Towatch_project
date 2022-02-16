<?php
include "dbconnect.php"
if (isset($_POST['submit'])) {
    $nom=$_POST['Nom_user'];
    $prénom=$_POST['Prenom_user'];
    $email=$_POST['Email'];
    $password=$_POST['password'];
    $sexe=$_POST['Sexe'];
    $date=$_POST['Date_naissance'];
    $pays=$_POST['Pays'];
    $tel=$_POST['Num_tel'];
    $query="INSERT INTO utilisateurs(Nom_user,Prenom_user,Email,password,Sexe,Date_naissance,Pays,Num_tel)VALUES('$nom','$prénom','$email','$password','$sexe','$date','$pays','$tel');";
    if (!mysqli_query($con,$query)) {
      die('ERREUR');
    }else{
    echo "VALIDE";
    }
    }
?>