<?php

session_start();
include("dbconnect.php");
    if(@$_SESSION["autoriser"]!="oui"){
        header("location:login.html");
        exit();
    }

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


      
?>

      <!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>ToWatch</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
       <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="style2.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
          <style type="text/css">
.searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    text-decoration:none;
    }
</style>
   </head>
   <body class="inner_page tables_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/insta.png" alt="#" /></div>
                        <div class="user_info">
                           <h6><?=$_SESSION["nomPrenom"]?></h6>
                           <p><span class="online_animation"></span> En Ligne</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>"welcome ToWatcher"</h4>
                  <ul class="list-unstyled components">
        
                      <li><a href="index.php"><i class="fa fa-home orange_color"></i> <span>ToWatch Acceuil</span></a></li>
                    
                     <li><a href="films.php"><i class="fa fa-film purple_color2"></i> <span>Our Films</span></a></li>
         
                     <li><a href="series.php"><i class="fa fa-play-circle blue1_color"></i> <span>Our series</span></a></li>
                     <li>
                        <a href="watchlist.php"><i class="fa fa-bookmark red_color"></i> <span>Your watchlist</span></a>
                     </li>
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.php">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="project.php">> <span>Projects</span></a>
                           </li>
                           <li>
                              <a href="login.php">> <span>Login</span></a>
                           </li>
                           <li>
                              <a href="404_error.php">> <span>404 Error</span></a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.php"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/insta.png" alt="#" /><span class="name_user">ToWatcher</</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.php">My Profile</a>
                                       <a class="dropdown-item" href="settings.php">Settings</a>
                                       <a class="dropdown-item" href="help.php">Help</a>
                                       <a class="dropdown-item" href="deconnexion.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                               <!--search barre -->
      <div class="d-flex justify-content-lefter h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="" placeholder="Search...">
          <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>
    </div>
                             <!--  --> 

                           </div>
                           <!--------------------scroll film ------------------------------------------>
 
            <div class="movie-list-container">
                <h1 class="movie-list-title">nouveautés</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">

                                            <?php

          $data_tab = array();

        $final_tab=$conn->query("SELECT film, note, AVG(note) AS 'moy' FROM cluster_elem  GROUP BY film ORDER BY moy DESC LIMIT 8;");
        $final_tab->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($final_tab as $ligne) { 
          if ($ligne['moy'] > 3) {


$res=$conn->prepare("SELECT * FROM titles WHERE Id_title = :id LIMIT 1;");
         $res->execute([':id' => $ligne['film']]);
    foreach ($res as $ligne2) { 
            echo '
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/cine_nvt.jpg" alt="">
                            <span class="movie-list-item-title">';
          
          echo $ligne2['Title'];
        echo '</span><p class="movie-list-item-desc">';
          echo $ligne2['release_date'];
        echo '</p>
                            <button class="movie-list-item-button">Watch</button>
                                </div>';

}

   $data_tab = array( 
            $ligne['film'], 
            $ligne['note'],
            $ligne['moy']
          );} 
        }
 ?> 
                    </div>
                    <i class="fa fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">nouveauté</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/8.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/5.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/6.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/7.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/8.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/8.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/5.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/5.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/5.jpg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                    </div>
                    <i class="fa fa-chevron-right arrow"></i>
                </div>
            </div>
            
                     <!------------------- java script -------------------------------------------->

 <script src="app.js"></script>
                     <!----------------------------------------------------------------->
                        </div>
                     </div>
                     <div class="row">
                      
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2022 ToWatch All rights reserved.<br><br>
                           Distributed By: test
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Modal Heading</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     Modal body..
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end model popup -->
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>



