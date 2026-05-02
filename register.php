<?php
require 'config/db.php';

$error = '';

if (isset($_POST['register'])) {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required ❌";
    } else {

        // check email
        $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already exists ❌";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);
            $stmt->execute();

            header("Location: login.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link rel="stylesheet" href="/Projet/assets/css/register.css">
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
                <h2 class="mb-0">Register</h2>
            </div>
            
            <div class="card-body p-4">
                <?php if($error): ?>
                    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                <?php endif; ?>
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Name: </label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Email: </label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Password: </label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <div class="d-grid">
                        <button name="register" class="btn btn-primary btn-lg">
                            Register
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