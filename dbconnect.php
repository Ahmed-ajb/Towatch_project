<?php
$server="localhost";
$dbname="towatch";
$user="root";
$password="";
$con= mysqli_connect($server,$user,$password,$dbname);
if($con)
{
	echo "connected successfully";
}
else{
	echo "something is wrong";
}

?>