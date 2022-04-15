<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "towatch";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connection){
        die('Database connection error : ' .mysql_error());
    } 
?>