<?php
require 'config/db.php';

if (isset($_POST['send'])) {
    $contactname = $_POST['name'];
    $contactemail = $_POST['email'];
    $contactmessage = $_POST['message'];

    $query = "INSERT INTO messages (name, email, message) 
            VALUES ('$contactname','$contactemail','$contactmessage')";
    $result = mysqli_query($conn, $query);

    echo "<p style='color:green;'>Message envoyé avec succès</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Projet/assets/css/contact.css">
    <link rel="stylesheet" href="/Projet/assets/css/variable.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- navbar -->
    <?php include 'includes/header.php'; ?>
    <section class="container py-5">
        <div class="text-center my-5 mb-5">
            <h1>Contact Us</h1>
            <p class="text-muted">Feel free to reach out to us anytime</p>
        </div>

        <div class="row">
            <div class="col-md-5 mb-4">
                <h4>Get in Touch</h4>
                <p><strong>Address:</strong> Rabat, Morocco</p>
                <p><strong>Email:</strong> shoply@gmail.com</p>
                <p><strong>Phone:</strong> +212 666 677 655</p>
            </div>

            <div class="col-md-7">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Your name">
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>

                    <div class="mb-3">
                        <textarea rows="5" class="form-control" name="message" placeholder="Your message"></textarea>
                    </div>

                    <button class="btn btn-success w-100" name="send">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>