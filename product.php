<?php
require 'config/db.php';

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="/Projet/assets/css/product.css">
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h1 class="my-4 text-center">Our Products</h1>
        <div class="row g-4 prodetails">
        <?php while ($row = mysqli_fetch_assoc($result)) {?>
            <div class='col-12 col-md-3 product-card'>
                <img class="single-pro-image" src="assets/images/<?php echo $row['image']; ?>">
                <h3><?php echo $row ['name']; ?></h3>
                <p><?php echo $row ['description']; ?></p>
                <p><b><?php echo $row ['price']; ?> DH</b></p>
                <button>Add to cart</button>
            </div>
        <?php } ?>
        </div>
    </div>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>