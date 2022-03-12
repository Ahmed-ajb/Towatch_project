<?php
  session_start();
    include("dbconnect.php");

// 2 - Récupération du nombre de lignes contenu dans la table

/*$rqut_nb ="SELECT COUNT( date_ajout ) as recuperation FROM titles;";
$data_nb = mysql_fetch_array($rqut_nb);
$nb = ''.$data_nb['recuperation'].'';*/
  $contenutitles = $conn->query('SELECT * FROM titles ORDER BY Start_year Desc LIMIT 8;');

 echo '<table>';
  while($ligne = $contenutitles->fetch()){
    
    echo '<tr>';
        echo '<td>';
          echo $ligne['Id_title'];
        echo '</td>';
         echo '<td>';
          echo $ligne['Title'];
        echo '</td>';
         echo '<td>';
          echo $ligne['Genre'];
        echo '</td>';
         echo '<td>';
          echo $ligne['Langue'];
        echo '</td>';

        echo '<td>';
          echo $ligne['Is_Adult'];
           echo '</td>';

           echo '<td>';
              echo $ligne['Is_film'];
            echo '</td>';

           echo '<td>';
             echo $ligne['Start_year'];
           echo '</td>';
           echo '<td>';
             echo $ligne['release_date'];
           echo '</td>';

         echo '</tr>';
       }
       echo '<table>';

session_destroy();
?>
