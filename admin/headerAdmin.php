<?php
    require_once __DIR__ . '/sessionAdmin.php';
    require_once __DIR__ . "/../lib/pdo.php"; 
?>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-3">
        <div class="col-md-2 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="../assets/images/logo_jo.png" alt="Logo Jeux OLympiques - Paris 2024" width="100">
            </a>
        </div>
        <?php if (isAdminConnected()) { ?>

        <a href="logoutAdmin.php" class="btn btn-danger btn-lg me-2">Déconnexion</a>

        <?php } else { ?>

        <a href="loginAdmin.php" class="btn btn-info btn-lg text-white me-2">Connexion</a>

        <?php }?>


    </header>
</div>