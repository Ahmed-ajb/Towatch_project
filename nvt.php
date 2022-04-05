<?php

$tab = array();
$fichier = fopen("BD/fichierstxt/ratings.txt", "r"); //on ouvre le fichier en lecture
$i=0;

while(!feof($fichier))
  {
    //On verifie que la fin du fichier n'est pas atteinte
    $ligne = fgets($fichier, 100000); //On lit la ligne courante
    $informations = explode('' , $fichier[$i]); //On sépare les différents éléments constituant une ligne
    $tab[$i] = $informations[1]; // Je souhaite obtenir la deuxième information de mon fichier
    $tab[$i]= $informations[2]; // Je souhaite obtenir la troisième information de mon fichier
    $i = $i+1;
  }
  
echo "<tr><th> 1ère colonne </th><th> 2ème colonne </th></tr><br/>";
foreach($tab as $untab)
  {
    echo $untab;// afficher le nouveau tableau
  }


?>
