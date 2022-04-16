<?php

session_start();
include("dbconnect.php");
    

ini_set("memory_limit", "1024M");
//require "vendor/autoload.php";
require "src/KMeans/Space.php";
require "src/KMeans/Point.php";
require "src/KMeans/Cluster.php";


// tri par bulle 

   function tri_bulle(&$tableauN,&$tableauF)
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
}

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

$vider_histo_cluster_el = $conn -> query ("TRUNCATE TABLE `cluster_elem`");
$vider_histo_cluster_el -> execute();

$vider_histo_cluster = $conn -> query ("TRUNCATE TABLE `clusters`");
$vider_histo_cluster -> execute();

// display the cluster centers and attached points
foreach ($clusters as $num => $cluster) {
    $coordinates = $cluster->getCoordinates();

    /*printf (
      "Cluster %s [%d,%d]: %d points ==> \n ",
        $num + 1,
        $coordinates[0],
        $coordinates[1],
        count($cluster)
    );*/
   

foreach ($cluster as $point) {
  
 $res=$conn->prepare("INSERT INTO clusters (id_user, id_film, note, cluster_num)
 VALUES (:user, :film, :note , :cluster)");
         $res->execute([':user' => $point[0] , ':film' => $point[1] , ':note' => $point[2] , ':cluster' => $num + 1 ]);
    /*printf(
        "[%d,%d,%d]  \t\n ",
        $point[0],
        $point[1],
        $point[2]
    );*/
  }  
}
          // chercher le numero de cluster (user_session)
         $search=$conn->prepare("SELECT cluster_num FROM clusters WHERE id_user = :id;");
         $id = ($_SESSION['id']) ;
         $search->execute([':id' => $id]);
        $search->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($search as $ligne) { $clusterWuser = $ligne['cluster_num']; }

        //SELECT id_film, note, AVG(note)AS "MOY" , cluster_num  FROM clusters GROUP BY id_film   ORDER BY MOY DESC ;

        // recuperer tt les films , users , notes du mm cluster
        $rec=$conn->prepare("SELECT id_film, note FROM clusters WHERE cluster_num = :cluster_num;");
         $rec->execute([':cluster_num' => $clusterWuser]);
        $rec->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($rec as $ligne) { 


            $remp_cl_el=$conn->prepare("INSERT INTO cluster_elem (film, note)
 VALUES (:film, :note )");
         $remp_cl_el->execute([':film' => $ligne['id_film'] , ':note' => $ligne['note'] ]);

           
                  }


        $data_tab = array();

        $final_tab=$conn->query("SELECT film, note, AVG(note) AS 'moy' FROM cluster_elem  GROUP BY film ORDER BY moy DESC ;");
        $final_tab->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($final_tab as $ligne) { 
          if ($ligne['moy']) {
   $data_tab = array(
            $ligne['film'], 
            $ligne['note'],
            $ligne['moy']
          );} print_r($data_tab);

        }


?>
