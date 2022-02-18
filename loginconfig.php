<?php
    session_start();
     include "dbconnect.php";


    $myemail = $_POST["username"];
    $mypassword = $_POST["pwd"];
    $loFmUname = strtolower($myemail);

    
        $sql = "SELECT * FROM utilisateurs WHERE $myemail = '$db_field['email']' AND $mypassword = '$db_field['password']'";
        $result = mysql_query($sql);
        echo"dzebug";


        if($result){
            $_session['loged'] = '$myemail';
            header('location:index.html');
            die();
        }

        else{
            echo"Invalid username and/or password please";
            echo "<a href='login.php'>try again</a>";
        }

?>