<?php

  session_start();
  include "dbconnect.php";

 
    $nom=$_POST['username'];
    $prenom=$_POST['username'];
    $sexe=$_POST['sexe'];
    $date=$_POST['Date'];
    $pays=$_POST['pays'];
    $tel=$_POST['phone'];
    $prof=$_POST['profession'];

    $email=strtolower($_POST['email']);
    $password=$_POST['password'];
    $ville=$_POST['ville'];

      $req=$conn->prepare("select id_user from utilisateurs where email=? limit 1");
      $req->setFetchMode(PDO::FETCH_ASSOC);
      $req->execute(array($email));
      $tab=$req->fetchAll();
      if(count($tab)>0)
        echo "<script>alert('Email existe deja a chriif'); window.location='sign.php'</script>";
      else{
 
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO utilisateurs (Nom_user,Prenom_user,Email,Password,Occupation,Sexe,Date_naissance,Pays,Ville,Num_tel)
VALUES ('$nom','$prenom','$email','$password','$prof','$sexe','$date','$pays','$ville','$tel')";
 
$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='Login.html'</script>";}
?>
        
    
    
