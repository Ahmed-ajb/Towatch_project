<?php
ini_set("memory_limit", "1024M");
//require "vendor/autoload.php";
require "src/KMeans/Space.php";
require "src/KMeans/Point.php";
require "src/KMeans/Cluster.php";

$lignes = file("ratings.txt");


   $points = array();

$i=0;
if( file_exists("ratings.txt")){
  foreach ($lignes as $ligne ) {
    // code...
    $split=explode("\t", $ligne);
    $x = $split[0];
    $y = $split[1];
    $z = $split[2];
   $crd= array("$x","$y","$z");
    array_push($points,$crd);
    
  }}


 //create a 3-dimentions space
$space = new KMeans\Space(3);

// add points to space
foreach ($points as $i => $coordinates) {
    $space->addPoint($coordinates);
}

// cluster these points in 5 clusters
$clusters = $space->solve(5);

// display the cluster centers and attached points
foreach ($clusters as $num => $cluster) {
    $coordinates = $cluster->getCoordinates();

    printf (
      "Cluster %s [%d,%d]: %d points ==> \n ",
        $num + 1,
        $coordinates[0],
        $coordinates[1],
        count($cluster),
    );
foreach ($cluster as $point) {
   // var_dump($point->toArray());
    printf(
        "[%d,%d,%d]  \t\n ",
        $point[0],
        $point[1],
        $point[2]
    );
}   
}







// tri par bulle 

  /* function tri_bulle(&$tableauN,&$tableauF)
{
  $taille = count($tableauN);
  for($i = 1; $i < $taille; $i++)
  {
    for($j = $taille-1; $j >= $i; $j--)
    {
      if($tableauN[$j+1] > $tableauN[$j])
      {
      $temp = $tableauN[$j+1];
      $tableauN[$j+1] = $tableauN[$j];
      $tableauN[$j] = $temp;

      $temp2 = $tableauF[$h+1];
      $tableauF[$h+1] = $tableauF[$h];
      $tableauF[$h] = $temp2;
      }
    }
  }
}*/


?>
