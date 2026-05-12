<?php 
require '../../config/db.php';
$number = $_GET['id'];
$query = "DELETE FROM products WHERE id = $number";
$result = mysqli_query($conn, $query);

mysqli_close($conn);
header("Location: all_products.php");
?>