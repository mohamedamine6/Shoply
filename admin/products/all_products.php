<?php
session_start();
require '../../config/db.php';
//pagination
$limit = 5;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$start = ($page - 1) * $limit;

$countQuery = "SELECT COUNT(*) AS total FROM products";
$countResult = mysqli_query($conn, $countQuery);
$totalRow = mysqli_fetch_assoc($countResult);
$totalProducts = $totalRow['total'];

//affichage Tous les produits avec le nom de la catégorie
$query = "SELECT products.*, categories.name AS category_name
          FROM products
          LEFT JOIN categories ON products.category_id = categories.id
          LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

if ($totalProducts) {
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
                
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div>
                                <h2 class="fw-bold mb-1">All Products</h2>
                                <p class="text-muted mb-0">
                                    Total product : <?php echo $totalProducts; ?>
                                </p>
                            </div>

                            <a href="add_product.php" class="btn btn-primary">
                                <i class='bx bx-plus'></i>
                                Add Product
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>created</th> 
                                        <th>Gender</th> 
                                        <th>Category</th> 
                                        <th>Update</th>
                                        <th>Delete</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($product = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $product['id']; ?></td>
                                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                                            <td><?php echo $product['price']; ?></td>
                                            <td>
                                                <img src="/Projet/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                                                alt="<?php echo htmlspecialchars($product['name']); ?>" width="80">
                                            </td>
                                            <td><?php echo $product['created_at']; ?></td>
                                            <td><?php echo htmlspecialchars($product['gender']); ?></td>
                                            <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                                            <td>
                                                <a href="update_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class='bx bx-edit'></i> Update
                                                </a>
                                            </td>
                                            <td>
                                                <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class='bx bx-trash'></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
<?php } ?>
                    </div>
                </div>   
            </div>
        </div>
                <?php
    $totalPage = ceil($totalProducts / $limit);

    if ($totalPage > 1) {

        $startPage = max(1, min($page - 2, $totalPage - 4));
        $endPage = min($totalPage, $startPage + 4);
    ?>

    <nav class="mt-4 d-flex justify-content-center">

        <ul class="pagination shadow-sm">

            <?php for ($i = $startPage; $i <= $endPage; $i++) { ?>

                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">

                    <a class="page-link"
                    href="all_products.php?page=<?php echo $i; ?>">

                        <?php echo $i; ?>

                    </a>

                </li>

            <?php } ?>

        </ul>

    </nav>

    <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>