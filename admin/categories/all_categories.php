<?php
session_start();
require '../../config/db.php';

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
$totalCategories = mysqli_num_rows($result);

if ($totalCategories) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="/Projet/admin/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/admin/assets/css/dashboard.css">
    <link rel="stylesheet" href="/Projet/admin/assets/css/products.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- sidebar starts here -->
        <?php include '../includes/header.php'; ?>
        <div id="page-content-wrapper">

            <!-- sidebar ends here -->
            <?php include '../includes/sidebar.php'; ?>
            <div>
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="cart-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h2 class="fw-bold mb-1">All Categorys</h2>
                                <p class="text-muted mb-0">
                                    Total category: <?php echo $totalCategories; ?>
                                </p>
                            </div>
                            <a href="add_category.php" class="btn btn-primary">
                                <i class='bx bx-plus'></i>
                                Add Category
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($category = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $category['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($category['name']); ?>
                                        </td>
                                        <td>
                                            <a href="delete_category.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                                <i class='bx bx-trash'></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
<?php }; ?>    
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>