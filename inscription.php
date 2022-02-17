<?php
include "dbconnect.php"
if (isset($_POST['Inscrire'])) {
    $nom=$_POST['nom'];
    $prénom=$_POST['prenom'];
    $sexe=$_POST['Sexe'];
    $date=$_POST['Date de naissance'];
    $pays=$_POST['pays'];
    $tel=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['Mot de passe'];
     $ville=$_POST['ville'];
    $query="INSERT INTO `utilisateurs`(`Id_user`, `Nom_user`, `Prenom_user`, `Sexe`, `Date_naissance`, `Pays`, `Num_tel`, `Email`, `password`, `ville`) VALUES ('3','$nom','$prénom','$sexe','$date','$pays','$tel','$email','$password','$ville')";
    $con = mysql_connect('localhost','root','','towatch');//for wamp 3rd feild is balnk
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