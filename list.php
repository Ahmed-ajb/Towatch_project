<?php
session_start();
include("dbconnect.php");

    if(@$_SESSION["autoriser"]!="oui"){
        header("location:login.html");
        exit();
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
      <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
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
.rating {
width: 226px;
margin: 0 auto 1em;
font-size: 10px;
overflow:hidden;
}
.rating a {
float:right;
color: #aaa;
text-decoration: none;
-webkit-transition: color .4s;
-moz-transition: color .4s;
-o-transition: color .4s;
transition: color .4s;
}
.rating a:hover,
.rating a:hover ~ a,
.rating a:focus,
.rating a:focus ~ a{
color: green;
cursor: pointer;
}
.rating2 {
direction: rtl;
}
.rating2 a {
float:none
}


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
        .star {
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .hover {
            color: rgb(255, 196, 0);

        }
    </style>
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
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user.png" alt="#" /></div>
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
                              <a href="404_error.php"><span>404 Error</span></a>
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
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user.png" alt="#" /><span class="name_user">ToWatcher</</span></a>
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
                <h1 class="movie-list-title">Tendance</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                                 <?php
                          $res=$conn->query("SELECT  * FROM titles ORDER BY release_date Desc LIMIT 8;");
        $res->setFetchMode(PDO::FETCH_ASSOC);
$i = 0;
        foreach ($res as $ligne) {
$i = $i + 1 ;
echo '

             <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/cine_nvt.jpg" alt="">
                            <span class="movie-list-item-title">';
          echo $ligne['Title'];
        echo '</span><div class="movie-list-item-desc"><p>';
                  echo $ligne['release_date'];

echo '
      <h>note : </h> <div class="rating rating2"> 
        <a href="?mod=actualite&id='.$_GET['id'].'&stars=5" title="Give 5 stars">★</a>
        <a href="?mod=actualite&id='.$_GET['id'].'&stars=4" title="Give 4 stars">★</a>
        <a href="?mod=actualite&id='.$_GET['id'].'&stars=3" title="Give 3 stars">★</a>
        <a href="?mod=actualite&id='.$_GET['id'].'&stars=2" title="Give 2 stars">★</a>
        <a href="?mod=actualite&id='.$_GET['id'].'&stars=1" title="Give 1 star">★</a>
    </div>
        
                                      <br><h>Add to watchlist  : </h>
                                        

                                        <!-- <input class="toggle-heart" type="checkbox" name="heart"/>-->
                                        <label for="toggle-heart">❤</label>

                            <button style = "top : -50px" class="movie-list-item-button">Watch</button></div>
                        </div>';
       } ?>
                        </div>
                    <i class="fa fa-chevron-right arrow"></i>
                </div>
            </div>

             
            </div></div>

           
                     <!------------------- java script -------------------------------------------->
<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
 <script src="app.js"></script>
<script src="sys_note.js"></script>
  
   <script>
        var ratedIndex = -1, uID = 2;
 
        $(document).ready(function () {
            resetStarColors();
 
            if (localStorage.getItem('ratedIndex') != null) {
                setStars(parseInt(localStorage.getItem('ratedIndex')));

                uID = localStorage.getItem('uID');
            }
 
            $('.fa-star').on('click', function () {
                alert('salut');
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
            alert(ratedIndex);
            });
 
            $('.fa-star').mouseover(function () {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });
 
            $('.fa-star').mouseleave(function () {
                resetStarColors();
 
                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });
 
        function saveToTheDB() {
            $.ajax({
               url: 'index.php',
               method: 'POST',
               dataType: 'json',
               data: {
                   save: 1,
                   uID: uID,
                   ratedIndex: ratedIndex
               }, success: function (r) {
                    uID = r.id;
                    localStorage.setItem('uID', uID);
               }
            });
        }
 
        function setStars(max) {
            for (var i=0; i <= max; i++)
                $('.fa-star:eq('+i+')').css('color', 'green');
        }
 
        function resetStarColors() {
            $('.fa-star').css('color', 'white');
        }
    </script>





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