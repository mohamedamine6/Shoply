<?php
session_start();

//Suprimer un produit
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cart'] [$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

//Ajouter produit au panier
if (isset($_POST['add_to_cart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'qty' => $qty
    ];

    header("location: cart.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/assets/css/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <div class="container py-5 my-5">
        <h2 class="text-center mb-4">My Cart</h2>
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <?php 
            $total = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $price = $item['price'] ?? 0;
                    $qty = $item['qty'] ?? 0;
                    $subTotal = $price * $qty;
                    $total += $subTotal;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $item['name'] ?? '---'; ?></td>
                    <td><?php echo $item['price'] ?? 0; ?></td>
                    <td><?php echo $item['qty'] ?? 0; ?></td>
                    <td><?php echo $subTotal; ?></td>
                    <td><a href="cart.php?delete=<?php echo $item['id']?>" onclick="return confirm('Do you want delete');" class="btn btn-danger btn-sm">
                            <i class='bx bx-message-alt-x'></i>
                        </a>
                    </td>
                </tr>
            </tbody>

            <?php } } ?>
        </table>

        <h4>Total: <?php echo $total; ?> DH</h4>
    </div>

    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>