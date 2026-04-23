<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "shoply";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die ("connection failed: " . mysqli_connect_erreur());
}// else { echo "bonne connection";}
?>