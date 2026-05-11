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
        <?php include 'includes/header.php'; ?>
        <div id="page-content-wrapper">

            <!-- sidebar ends here -->
            <?php include 'includes/sidebar.php'; ?>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Commandes</h3>
                                <p  class="fs-2">248</p>
                                <p>+12 cette semaine</p>
                            </div>
                            <i class='bx bx-cart fs-1 primary-text border rounded-full secondary-bg p-3'></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Revenue</h3>
                                <p  class="fs-2">18 450 DH</p>
                                <p>+8% ce mois</p>
                            </div>
                            <i class='bx bx-dollar fs-1 primary-text border rounded-full secondary-bg p-3'></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Customers</h3>
                                <p  class="fs-2">134</p>
                                <p>+5 nouveaux</p>
                            </div>
                            <i class='bx bx-user fs-1 primary-text border rounded-full secondary-bg p-3'></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Products</h3>
                                <p  class="fs-2">67</p>
                                <p>3 en rupture</p>
                            </div>
                            <i class='bx bxs-package fs-1 primary-text border rounded-full secondary-bg p-3'></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 container-fluid px-4">

                <!-- Dernières commandes -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm border-0 rounded-3">

                        <div class="card-header bg-white">
                            <h5 class="mb-0 fw-bold">
                                <i class='bx bx-cart-alt'></i>
                                Dernières commandes
                            </h5>
                        </div>

                        <div class="card-body">

                            <table class="table table-hover align-middle">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Produit</th>
                                        <th>Montant</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>#1021</td>
                                        <td>Mohamed</td>
                                        <td>T-shirt Nike</td>
                                        <td>450 DH</td>
                                        <td>
                                            <span class="badge bg-success">
                                                Livré
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>#1022</td>
                                        <td>Yassine</td>
                                        <td>Watch Casio</td>
                                        <td>1200 DH</td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                En attente
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>#1023</td>
                                        <td>Karim</td>
                                        <td>Air Jordan</td>
                                        <td>2200 DH</td>
                                        <td>
                                            <span class="badge bg-danger">
                                                Annulé
                                            </span>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

                <!-- Derniers messages -->
                <div class="col-lg-4 mb-4">

                    <div class="card shadow-sm border-0 rounded-3">

                        <div class="card-header bg-white">
                            <h5 class="mb-0 fw-bold">
                                <i class='bx bx-chat'></i>
                                Derniers messages
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="d-flex align-items-start mb-4">

                                <div class="d-flex align-items-center justify-content-center border rounded-circle secondary-bg text-white ms-2 me-1" style="width:40px; height:40px;">
                                   <span class="p-0 second-text fw-bold">M</span>
                                </div>

                                <div>
                                    <h6 class="mb-1 fw-bold">
                                        Mohamed
                                    </h6>

                                    <p class="text-muted small mb-0">
                                        Bonjour, ma commande est arrivée ?
                                    </p>
                                </div>

                            </div>

                            <div class="d-flex align-items-start mb-4">

                                <div class="d-flex align-items-center justify-content-center border rounded-circle secondary-bg text-white ms-2 me-1" style="width:40px; height:40px;">
                                    <span class="p-0 second-text fw-bold">K</span>
                                </div>

                                <div>
                                    <h6 class="mb-1 fw-bold">
                                        Karim
                                    </h6>

                                    <p class="text-muted small mb-0">
                                        Je veux changer la taille.
                                    </p>
                                </div>

                            </div>

                            <div class="d-flex align-items-start">

                                <div class="d-flex align-items-center justify-content-center border rounded-circle secondary-bg text-white ms-2 me-1" style="width:40px; height:40px;">
                                    <span class="p-0 second-text fw-bold">S</span>
                                </div>

                                <div>
                                    <h6 class="mb-1 fw-bold">
                                        Sara
                                    </h6>

                                    <p class="text-muted small mb-0">
                                        Merci pour le service 🔥
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Produits récents -->

            <div class="container-fluid px-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold">
                            <i class='bx bxs-package'></i>
                            Produits récents
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Catégorie</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/60"
                                            class="rounded">
                                        </td>

                                        <td>Nike Hoodie</td>

                                        <td>650 DH</td>

                                        <td>
                                            <span class="badge bg-success">
                                                Disponible
                                            </span>
                                        </td>

                                        <td>Vêtements</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/60"
                                            class="rounded">
                                        </td>

                                        <td>Apple Watch</td>

                                        <td>3200 DH</td>

                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                Peu
                                            </span>
                                        </td>

                                        <td>Accessoires</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/60"
                                            class="rounded">
                                        </td>

                                        <td>Jordan 4</td>

                                        <td>2800 DH</td>

                                        <td>
                                            <span class="badge bg-danger">
                                                Rupture
                                            </span>
                                        </td>

                                        <td>Chaussures</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>