            <!-- sidebar ends here -->
<?php
$userName = $_SESSION['user_name'] ?? '';
?>
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
                                <?php echo strtoupper(substr($userName, 0, 2)); ?>
                            </a>
                        </li>

                        <!-- Nom complet -->
                        <li class="nav-item ms-2">
                            <a href="#" class="nav-link second-text fw-bold">
                                <?php echo htmlspecialchars($userName); ?>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var el = document.getElementById("wrapper");
                    var toggleButton = document.getElementById("menu-toggle");
                    if (toggleButton && el) {
                        toggleButton.addEventListener("click", function () {
                            el.classList.toggle("toggled");
                        });
                    }
                });
            </script>