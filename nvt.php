<?php
  session_start();
    include("dbconnect.php");

// 2 - Récupération du nombre de lignes contenu dans la table
$rqut_nb ="SELECT COUNT( date_ajout ) as recuperation FROM titles;";
$data_nb = mysql_fetch_array($rqut_nb);
$nb = ''.$data_nb['recuperation'].'';

// 3 - Nombre de lignes à récupérer
$ligne = $nb - 8;

// 4 - Récupération des lignes
$query = "SELECT * FROM `titles` LIMIT $ligne , $nb";
$result = mysql_query( $query );

// 5 - Vérification
if ( !$result ) {
  $message  = 'Invalid query: ' . mysql_error() . "n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// 6 - Afficher les résultats
while ( $row = mysql_fetch_assoc( $result ) ) {
echo '  Date: ' . $row['date_ajout'] . ' - ' . "n";
echo '  title ' . $row['title'] . ' kWh,' . "n";
echo '<br />';
}

// Fermer la connexion à MySQL
session_destroy();
?>