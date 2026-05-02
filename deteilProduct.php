<?php
session_start();

require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id']);

$query = "SELECT products.*, categories.name as category_name
FROM products
JOIN categories ON products.category_id = categories.id
WHERE products.id = $id";

$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/assets/css/deteilProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-6 product-img">
                <img src="assets/images/<?php echo $product['image']; ?>" alt="product">
            </div>

            <div class="col-md-6 product">
                <form method="POST" action="cart.php">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
    
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p><b><?php echo $product['price']; ?> DH</b></p>

                    <?php if($product['category_id'] == 1) {?>
                        <select name="" id="" class="form-control my-3">
                        <option value="">Chose Size</option>
                        <option value="">S</option>
                        <option value="">M</option>
                        <option value="">L</option>
                        <option value="">XL</option>
                    </select>
                    <?php } ?>

                    <input type="number" name="qty" value="1" min="1" class="form-control w-25 mb-5">
                    <button type="submit" name="add_to_cart" class="buy-btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>