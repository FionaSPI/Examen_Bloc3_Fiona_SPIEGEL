<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inscription -JO Paris 2024</title>
</head>


<body>

    <!---------------------------------------------------- HEADER ---------------------------------------------------->

    <header class="bg-white">
        <?php include_once __DIR__ . '/headerAdmin.php';
        require_once __DIR__ . '/../lib/pdo.php';
        require_once __DIR__ . '/admin.php';
        

        $errors = [];

        if (isset($_POST['loginAdmin'])) {
            $admin = verifyAdminLoginPassword($pdo, $_POST['identifiants'], $_POST['password']);

            if ($admin) {
                // on va le connecter => session
                $_SESSION['admin'] = $admin;
                header('location: adminSpace.php');
            } else {
                   // afficher une erreur
                $errors[] = "Email ou mot de passe incorrect";
            }
        }?>
    </header>
    <!----------------------------------------------------- MAIN ----------------------------------------------------->

    <main class="h-75 shadow row mx-auto bg-light bg-opacity-50">

        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="row">

                <h1 class="pt-5 d-flex justify-content-center">Connexion</h1>

                <!---------------------------------------- FORMULAIRE DE CONNEXION ---------------------------------------->
                <?php
                foreach ($errors as $error) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$error; ?>
                </div>
                <?php }
                ?>

                <form action="" method="POST" class="col-sm-10 col-md-8 col-lg-8 mx-auto py-5">
                    <div class="mb-3">
                        <label for="identifiants" class="form-label">Adresse email :</label>
                        <input type="text" name="identifiants" id="identifiants" class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" name="password" id="password" class="form-control" require>
                    </div>

                    <input type="submit" name="loginAdmin" value="Connexion" class="btn btn-info text-white my-5">
                </form>
            </div>

    </main>

    <!---------------------------------------------------- FOOTER ---------------------------------------------------->

    <footer class='bg-white'>
        <?php include_once __DIR__."/../templates/footer.php"?>
    </footer>

</body>

</html>