<?php
    session_start();
   $servername = "localhost";
$username = "root";
$password = "";
if(ISSET($_POST['inscrire'])){
        if($_POST['nom'] != "" || $_POST['prenom'] != "" || $_POST['email'] != ""|| $_POST['Mot de passe'] != "" || $_POST['Date de naissance'] != ""|| $_POST['sexe'] != "" || $_POST['pays'] != ""|| $_POST['ville'] != "" || $_POST['phone'] != ""){
try {
  $conn = new PDO("mysql:host=$servername;dbname=towatch", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `utilisateurs` VALUES ('1', '$nom', '$prenom', '$email', '$pass','$sexe','$date_naissance','$pays','$ville','$phone')";
                $conn->exec($sql);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
 $conn = null;}}
    
?>