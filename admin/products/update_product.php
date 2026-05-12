<?php
require '../../config/db.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: all_products.php');
    exit;
}

$id = intval($_GET['id']);
$errors = [];

// Charger les catégories
$categories = [];
$catQuery = "SELECT id, name FROM categories";
$catResult = mysqli_query($conn, $catQuery);
while ($row = mysqli_fetch_assoc($catResult)) {
    $categories[] = $row;
}

// Charger les données du produit
$productQuery = "SELECT * FROM products WHERE id = $id LIMIT 1";
$productResult = mysqli_query($conn, $productQuery);
if (!$productResult || mysqli_num_rows($productResult) === 0) {
    header('Location: all_products.php');
    exit;
}
$product = mysqli_fetch_assoc($productResult);

// Pré-remplir les champs
$name = $product['name'];
$description = $product['description'];
$price = $product['price'];
$image = $product['image'];
$gender = $product['gender'];
$category_id = $product['category_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $gender = $_POST['gender'] ?? '';
    $category_id = $_POST['category_id'] ?? '';

    // Gestion de l'image (si fichier uploadé)
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/images/';
        $fileName = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $fileName;
        } else {
            $errors[] = 'Erreur lors du téléchargement de l\'image.';
        }
    }

    // Validation
    if ($name === '') {
        $errors[] = 'Le nom est obligatoire.';
    }
    if ($price === '' || !is_numeric($price)) {
        $errors[] = 'Le prix doit être un nombre.';
    }
    if ($category_id === '' || !ctype_digit($category_id)) {
        $errors[] = 'La catégorie est obligatoire.';
    }
    if ($gender === '') {
        $errors[] = 'Le genre est obligatoire.';
    }

    if (empty($errors)) {
        $name = mysqli_real_escape_string($conn, $name);
        $description = mysqli_real_escape_string($conn, $description);
        $price = floatval($price);
        $image = mysqli_real_escape_string($conn, $image);
        $category_id = intval($category_id);
        $gender = mysqli_real_escape_string($conn, $gender);

        $updateQuery = "UPDATE products SET name = '$name', description = '$description', price = $price, image = '$image', gender = '$gender', category_id = $category_id WHERE id = $id";
        mysqli_query($conn, $updateQuery);

        header('Location: all_products.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le produit</title>
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
                        <h2>Modifier le produit</h2>
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
                                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" required><?php echo htmlspecialchars($description); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo htmlspecialchars($price); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Image actuelle</label>
                                <br>
                                <img src="/Projet/assets/images/<?php echo htmlspecialchars($image); ?>" alt="Image actuelle" width="100">
                                <br>
                                <label class="form-label fw-bold">Nouvelle image (optionnel)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?php echo $gender === 'Male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo $gender === 'Female' ? 'selected' : ''; ?>>Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Category</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $category_id ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($category['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                            <a href="all_products.php" class="btn btn-secondary">Cancel</a>
                        </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
