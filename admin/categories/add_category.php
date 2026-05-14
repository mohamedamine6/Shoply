<?php
session_start();
require '../../config/db.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $query = "INSERT INTO categories (name) VALUES ('$name')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);

    header('Location: all_categories.php');
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
    <link rel="stylesheet" href="/Projet/admin/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/admin/assets/css/dashboard.css">
    <link rel="stylesheet" href="/Projet/admin/assets/css/auth.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php include '../includes/header.php'; ?>
        <div id="page-content-wrapper">
            <?php include '../includes/sidebar.php'; ?>

            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="card shadow-lg register-card">
                    <div class="card-header text-center">
                        <h2>Add Category</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name Category</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Category</button>
                            <a href="all_categories.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>