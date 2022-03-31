<?php
        session_start();
    include("dbconnect.php");

    @$email=strtolower($_POST["email"]);
    @$password=$_POST["password"];

        $res=$conn->prepare("select * from utilisateurs where email=? and password=? limit 1");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute(array($email,$password));
        $tab=$res->fetchAll();
        if(count($tab)==0)
          echo "<script>alert('Mauvais login ou mot de passe!'); window.location='login.php'</script>";
            // echo "<a href='login.php'>try again</a>";
        else{


          $_SESSION["autoriser"]="oui";
          $_SESSION["nomPrenom"]=strtoupper($tab[0]["Nom_user"]." ".$tab[0]["Prenom_user"]);
          $_SESSION["email"]=["email"];
          header("location:index.php");

        }

?>