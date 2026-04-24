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
        <section id="feature" class="container my-5">

            <div class="row text-center g-4">

                <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 shadow-sm rounded">
                    <img src="../assets/images/features/f1.png" class="img-fluid mb-2" alt="">
                    <h6>Free Shipping</h6>
                </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 shadow-sm rounded">
                    <img src="../assets/images/features/f2.png" class="img-fluid mb-2" alt="">
                    <h6>Online Order</h6>
                </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 shadow-sm rounded">
                    <img src="../assets/images/features/f3.png" class="img-fluid mb-2" alt="">
                    <h6>Save Money</h6>
                </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 shadow-sm rounded">
                    <img src="../assets/images/features/f4.png" class="img-fluid mb-2" alt="">
                    <h6>Promotions</h6>
                </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 shadow-sm rounded">
                    <img src="../assets/images/features/f5.png" class="img-fluid mb-2" alt="">
                    <h6>Happy Sell</h6>
                </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 shadow-sm rounded">
                    <img src="../assets/images/features/f6.png" class="img-fluid mb-2" alt="">
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

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>