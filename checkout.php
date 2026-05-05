<?php
session_start();

require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
}

if (isset($_POST['checkout'])) {
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['name'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
// Récupérer les produits du panier depuis la session (ou tableau vide si le panier n'existe pas)
    $cart = $_SESSION['cart'] ?? [];

    if (empty($cart)) {
        echo "Cart is empty";
        exit();
    }

// Calculer le total du panier (prix × quantité pour chaque produit)
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['qty'];
    }

    // 1.insert order
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
    $stmt->bind_param("id", $user_id, $total);
    $stmt->execute();

    $order_id = $conn->insert_id;

    // 2. insert order items
    foreach ($cart as $item) {

        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, name, price, qty) 
                               VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("iisdi",
            $order_id,
            $item['id'],
            $item['name'],
            $item['price'],
            $item['qty']
        );

        $stmt->execute();
    }

    // 3. insert shipping
    $stmt = $conn->prepare("INSERT INTO shipping_addresses (order_id, full_name, phone, address, city) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss",
        $order_id,
        $full_name,
        $phone,
        $city,
        $address
    );
    
    $stmt->execute();

    // 4. vider cart
    unset($_SESSION['cart']);

    header("location: success.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/assets/css/checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg carts">
            <div class="card-header text-center ">
                <h2 class="mb-0">Checkout</h2>
            </div>
            
            <div class="card-body p-5">
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name: </label>
                        <input name="name" class="form-control mb-3" placeholder="Full Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Phone: </label>
                        <input name="phone" class="form-control mb-3" placeholder="Phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label fw-bold">City: </label>
                        <input name="city" class="form-control mb-3" placeholder="City" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address: </label>
                        <textarea name="address" class="form-control mb-3" placeholder="Address" required></textarea>
                    </div>

                    <div class="d-grid">
                        <button name="checkout" class="buy-btn w-100">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>