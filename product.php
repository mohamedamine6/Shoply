<?php
require 'config/db.php';

//pagination le total de produit
$totalQuery = "SELECT COUNT(*) as total FROM products";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);

$totalProducts = $totalRow['total'];

$limit = 8;
$totalPage = ceil($totalProducts / $limit);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$pagiQueri = "SELECT * FROM products LIMIT $start, $limit";
$pagiResult = mysqli_query($conn, $pagiQueri);

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
    <div class="container py-5 mt-5">
        <h1 class="my-4 mt-5 text-center">Our Products</h1>
        <div class="row max-auto container-fluid">
        <?php while ($row = mysqli_fetch_assoc($pagiResult)) {?>
            <div class='product text-center col-lg-3 col-lg-3 col-12'>
                <a href="cart.php?id=<?php echo $row ['id']; ?>">
                    <img class="" src="assets/images/<?php echo $row['image']; ?>">
                    <h3><?php echo $row ['name']; ?></h3>
                </a>
                <p><?php echo $row ['description']; ?></p>
                <p><b><?php echo $row ['price']; ?> DH</b></p>
                <button class="buy-btn">Add to cart</button>
            </div>
        <?php } ?>
        </div>
        <div class="text-center mt-4">

            <?php
            $range = 2;

            $startPage = max(1, $page - $range);
            $endPage = min($totalPage, $page + $range);

            for ($i = $startPage; $i <= $endPage; $i++) {
                
                if ($i == $page) {
                    echo "<span class='btn btn-dark mx-1'>$i</span>";
                } else {
                    echo "<a href='product.php?page=$i' class='btn btn-outline-dark mx-1'>$i</a>";
                }
            }
            ?>

        </div>
    </div>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>