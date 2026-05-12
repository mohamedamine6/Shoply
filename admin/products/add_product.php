<?php
require '../../config/db.php';

$errors = [];

// Charger les catégories pour le select
$categories = [];
$catQuery = "SELECT id, name FROM categories";
$catResult = mysqli_query($conn, $catQuery);
while ($row = mysqli_fetch_assoc($catResult)) {
    $categories[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $gender = $_POST['gender'] ?? '';
    $category_id = $_POST['category_id'] ?? '';
    $image = '';

    // Gestion de l'upload d'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/images/';
        $fileName = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Vérifier si c'est une vraie image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $fileName;
            } else {
                $errors[] = 'Erreur lors du téléchargement de l\'image.';
            }
        } else {
            $errors[] = 'Le fichier n\'est pas une image valide.';
        }
    } else {
        $errors[] = 'L\'image est obligatoire.';
    }

    // Validation des autres champs
    if ($name === '') {
        $errors[] = 'Le nom est obligatoire.';
    }
    if ($description === '') {
        $errors[] = 'La description est obligatoire.';
    }
    if ($price === '' || !is_numeric($price)) {
        $errors[] = 'Le prix doit être un nombre.';
    }
    if ($gender === '') {
        $errors[] = 'Le genre est obligatoire.';
    }
    if ($category_id === '' || !ctype_digit($category_id)) {
        $errors[] = 'La catégorie est obligatoire.';
    }

    if (empty($errors)) {
        $name = mysqli_real_escape_string($conn, $name);
        $description = mysqli_real_escape_string($conn, $description);
        $price = floatval($price);
        $image = mysqli_real_escape_string($conn, $image);
        $gender = mysqli_real_escape_string($conn, $gender);
        $category_id = intval($category_id);

        $insertQuery = "INSERT INTO products (name, description, price, image, gender, category_id, created_at) 
                        VALUES ('$name', '$description', $price, '$image', '$gender', $category_id, NOW())";
        if (mysqli_query($conn, $insertQuery)) {
            header('Location: all_products.php');
            exit;
        } else {
            $errors[] = 'Erreur lors de l\'ajout du produit.';
        }
    }
}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
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
                        <h2>Add Product</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Unisex">Unisex</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo htmlspecialchars($category['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <a href="all_products.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>