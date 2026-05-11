<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/Projet/admin/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/admin/assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- sidebar starts here -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 border-bottom">
                <h3 class="fw-bold">Shop<span>ly</span></h3>
            </div>

            <div class="list-group list-group-flush my-3 d-flex flex-column vh-100">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class='bx bxs-dashboard'></i>
                    Dashboard
                </a>
                <a href="products/all_products.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class='bx bxs-package'></i>
                    Products
                </a>
                <a href="categories/all_categories.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class='bx bx-purchase-tag-alt'></i>
                    categories
                </a>
                <a href="orders/all_orders.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class='bx bx-cart'></i>
                    commandes
                </a>
                <a href="clients/all_clients.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class='bx bxs-group'></i>
                    Clients
                </a>
                <a href="messages/all_messages.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class='bx bx-chat'></i>
                    Messages
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold  mt-auto">
                    <i class='bx bx-log-out-circle' ></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>