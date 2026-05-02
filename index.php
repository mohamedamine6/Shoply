<?php
session_start();

require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM products LIMIT 4";
$result = mysqli_query($conn, $query);

$queryWatch = "SELECT * FROM products WHERE category_id = 4 LIMIT 4";
$resultWatch = mysqli_query($conn, $queryWatch);

$queryAcc = "SELECT * FROM products WHERE category_id = 3 LIMIT 4";
$resultAcc = mysqli_query($conn, $queryAcc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

        <section id="home">
            <div class="container">
                <h5>NEW ARRIVALS</h5>
                <h1><span>Best Price</span> This Year</h1>
                <p>Shoomatic offers your very comfortable time <br> on walking and exerciss.</p>
                <button onclick="window.location.href='product.php'">Shop Now</button>
            </div>
        </section>

        <!-- FEATURE SECTION -->
        <section id="feature" class="container my-5 py-5">

            <div class="row text-center g-4">

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-3 shadow-sm rounded">
                        <img src="/projet/assets/images/f1.png" class="img-fluid mb-2" alt="">
                        <h6>Free Shipping</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-3 shadow-sm rounded">
                        <img src="/projet/assets/images/f2.png" class="img-fluid mb-2" alt="">
                        <h6>Online Order</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-3 shadow-sm rounded">
                        <img src="/projet/assets/images/f3.png" class="img-fluid mb-2" alt="">
                        <h6>Save Money</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-3 shadow-sm rounded">
                        <img src="/projet/assets/images/f4.png" class="img-fluid mb-2" alt="">
                        <h6>Promotions</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-3 shadow-sm rounded">
                        <img src="/projet/assets/images/f5.png" class="img-fluid mb-2" alt="">
                        <h6>Happy Sell</h6>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-3 shadow-sm rounded">
                        <img src="/projet/assets/images/f6.png" class="img-fluid mb-2" alt="">
                        <h6>24/7 Support</h6>
                    </div>
                </div>

            </div>

        </section>  

        <!-- SECTION BANNER -->
        <section id="new" class="w-100">
            <div class="row p-0 m-0">
                <div class="one col-lg-4 col-md-12 col-12 p-0">
                    <img class="img-fluid" src="assets/images/new/1.jpg" alt="">
                    <div class="details">
                        <h2>Extreme rare sneakers</h2>
                        <button class="text-uppercase">Shop now</button>
                    </div>
                </div>

                <div class="one col-lg-4 col-md-12 col-12 p-0">
                    <img class="img-fluid" src="assets/images/new/3.jpg" alt="">
                    <div class="details">
                        <h2>Modern Classic Watches</h2>
                        <button class="text-uppercase">Shop now</button>
                    </div>
                </div>

                <div class="one col-lg-4 col-md-12 col-12 p-0">
                    <img class="img-fluid" src="assets/images/new/4.jpg" alt="">
                    <div class="details">
                        <h2>Minimal Style Accessories</h2>
                        <button class="text-uppercase">Shop now</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- best products -->
        <section id="featured" class="container my-5 py-5">
            <div class="text-center mt-5 py-5">
                <h3 class="h3hr">Our Featured</h3>
                <p>Here you can check our new products with fair price on Shoply</p>
            </div>
            <div class="row max-auto container-fluid">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
                    <div class="product text-center col-lg-3 col-lg-3 col-12">
                        <img class="single-pro-image" src="assets/images/<?php echo $row['image']; ?>" width='150'>
                        <div class="star">
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                        </div>
                        <h3><?php echo $row ['name'];?></h3>
                        <p><?php echo $row ['price'];?><b> DH</b></p>
                        <button class="buy-btn">Add to cart</button>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section id="featured" class="container">
            <div class="container text-center mt-5 py-5">
                <h3 class="h3hr">Our Accessories</h3>
                <p>Here you can check our new products with fair price on Shoply</p>
            </div>
            <div class="row max-auto container-fluid">
                <?php while ($row = mysqli_fetch_assoc($resultAcc)) { ?> 
                    <div class="product text-center col-lg-3 col-lg-3 col-12">
                        <img class="single-pro-image" src="assets/images/<?php echo $row['image']; ?>" width='150'>
                        <div class="star">
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                        </div>
                        <h3><?php echo $row ['name'];?></h3>
                        <p><?php echo $row ['price'];?><b> DH</b></p>
                        <button class="buy-btn">Add to cart</button>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section id="featured" class="container">
            <div class="container text-center mt-5 py-5">
                <h3 class="h3hr">Best Watch</h3>
                <p>Here you can check our new products with fair price on Shoply</p>
            </div>
            <div class="row max-auto container-fluid">
                <?php while ($row = mysqli_fetch_assoc($resultWatch)) { ?> 
                    <div class="product text-center col-lg-3 col-lg-3 col-12">
                        <img class="single-pro-image" src="assets/images/<?php echo $row['image']; ?>" width='150'>
                        <div class="star">
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                            <i class='bx bxs-star' ></i>
                        </div>
                        <h3><?php echo $row ['name'];?></h3>
                        <p><?php echo $row ['price'];?><b> DH</b></p>
                        <button class="buy-btn">Add to cart</button>
                    </div>
                <?php } ?>
            </div>
        </section>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>