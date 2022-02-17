<?php
include "dbconnect.php"
$objectPdo->prepare('INSERT INTO `utilisateurs' VALUES (:Nom_user,:Prenom_user,:Sexe,:Date_naissance,:Pays,:Num_tel,:Email,:password,:ville)');
    $pdostat->bindValue(':Nom_user,$_POST['nom'],PDO::PARAM_STR);
$pdostat->bindValue(':Prenom_user,$_POST['prenom'],PDO::PARAM_STR);
    $pdostat->bindValue(':Sexe,$_POST['Sexe'],PDO::PARAM_STR);
$pdostat->bindValue(':Date_naissance,$_POST['date'],PDO::PARAM_STR);
    $pdostat->bindValue(':Pays,$_POST['pays'],PDO::PARAM_STR);
$pdostat->bindValue(':Num_tel,$_POST['phone'],PDO::PARAM_STR);
    $pdostat->bindValue(':Email,$_POST['email'],PDO::PARAM_STR);
$pdostat->bindValue(':password,$_POST['Mot de passe'],PDO::PARAM_STR);
    $pdostat->bindValue(':ville,$_POST['ville'],PDO::PARAM_STR);
$inserer=$pdostat->execute();
if($inserer){
    $message='utilisateur ajouté';
}else{
    $message='insertion echouée';

}
$conn = null;
  
   
?>
?>