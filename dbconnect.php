
       <?php
$server = "localhost";
$username = "username";
$password = ""; //your password

// Create connection
$connection = mysqli_connect($server, $username, $password);

// Check connection
if (!$connection) {
  die("Connection error: " . mysqli_connect_error());
}
echo "Connection successfull";
?>
