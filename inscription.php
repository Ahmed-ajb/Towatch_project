<?php
include "dbconnect.php"
if (isset($_POST['submit'])) {
    $nom=$_POST['nom'];
    $prénom=$_POST['prenom'];
    $email=$_POST['email'];
    $password=$_POST['Mot de passe'];
    $sexe=$_POST['Sexe'];
    $date=$_POST['Date_naissance'];
    $pays=$_POST['pays'];
    $ville=$_POST['ville'];
    $tel=$_POST['phone'];
    $query="INSERT INTO utilisateurs(Nom_user,Prenom_user,Email,password,Sexe,Date_naissance,Pays,ville,Num_tel)VALUES('$nom','$prénom','$email','$password','$sexe','$date','$pays','$ville','$tel');";
    
    $con = mysql_connect("localhost","root" ,"");//for wamp 3rd feild is balnk
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("$database", $con);
    if (!mysqli_query($con,$query)) {
      die('ERREUR');
    }else{
    echo "VALIDE";
    }
    }
?>