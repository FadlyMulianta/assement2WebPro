<?php 
$host = "localhost:3308";
$user = "root";
$pass = "";
$dbname = "db_skinnew";
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}


?>