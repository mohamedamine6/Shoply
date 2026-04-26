<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="/Projet/assets/css/blog.css">
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <section class="container py-5 mt-5">

        <div class="text-center mb-5">
            <h1 class="fw-bold">About Shoply</h1>
            <p class="text-muted">Your modern online store for fashion & lifestyle</p>
        </div>

        <!-- Content -->
        <div class="row align-items-center">

            <!-- Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="assets/images/about.jpg" class="img-fluid rounded shadow" alt="About Shoply">
            </div>

            <!-- Text -->
            <div class="col-lg-6">
            <h3 class="fw-bold">Who We Are</h3>
            <p>
                Shoply is a modern e-commerce platform designed to provide stylish,
                high-quality products at affordable prices. We focus on simplicity,
                performance, and user experience.
            </p>

            <h4 class="mt-4">Our Mission</h4>
            <p>
                Our mission is to make online shopping easy, fast, and enjoyable
                for everyone, anywhere.
            </p>

            <h4 class="mt-4">What We Offer</h4>
            <ul>
                <li>Trendy clothing</li>
                <li>Modern watches</li>
                <li>Stylish accessories</li>
            </ul>

            <h4 class="mt-4">Why Choose Us</h4>
            <ul>
                <li>High-quality products</li>
                <li>Affordable prices</li>
                <li>Fast delivery</li>
                <li>24/7 support</li>
            </ul>

            </div>

        </div>

    </section>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>