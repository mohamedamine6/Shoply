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
        <!-- sidebar ends here -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="bx bx-objects-horizontal-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                        <!-- Icône notification -->
                        <li class="nav-item d-flex align-items-center justify-content-center border rounded-circle bg-light" style="width:40px; height:40px;">
                            <a href="#" class="nav-link p-0 second-text fw-bold">
                                <i class='bx bx-bell'></i>
                            </a>
                        </li>

                        <!-- Initiales utilisateur -->
                        <li class="nav-item d-flex align-items-center justify-content-center border rounded-circle secondary-bg text-white ms-2" style="width:40px; height:40px;">
                            <a href="#" class="nav-link p-0 second-text fw-bold">
                                MA
                            </a>
                        </li>

                        <!-- Nom complet -->
                        <li class="nav-item ms-2">
                            <a href="#" class="nav-link second-text fw-bold">
                                Mohamed Amine
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>