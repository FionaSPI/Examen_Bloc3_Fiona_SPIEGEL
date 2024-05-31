<?php
    require_once __DIR__ . "/../lib/session.php";
    require_once __DIR__ . "/../lib/pdo.php"; 
?>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-3">
        <div class="col-md-2 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="assets/images/logo_jo.png" alt="Logo CheckIt" width="100">
            </a>
        </div>
        <?php if (isUserConnected()) { ?>

        <ul class="nav col-md-4">
            <li><a href="tickets.php"> <img src="./assets/images/acheterTickets.png" style="width:15rem" alt=""></a>
            </li>
        </ul>

        

            <a href="logout.php" class="btn btn-danger btn-lg me-2">Déconnexion</a>
            <!-- <a href="cart.php"> <img src="./assets/images/panierLogo.png" style="width : 50px"
                    alt="Logo représentant un chariot de rangement pour balles de sport, dans lequel on peut voir les anneaux des jeux olympique qui représentent des balles"></a> -->

            <?php } else { ?>
            <ul class="nav col-md-4">
                <li><a href="register.php"> <img src="./assets/images/acheterTickets.png" style="width:15rem"
                            alt=""></a></li>
            </ul>
            <a href="login.php" class="btn btn-info btn-lg text-white me-2">Connexion</a>

            <?php } ?>



    </header>
</div>