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
        <?php
        include_once __DIR__. '/templates/header.php';
        require_once __DIR__ . '/lib/pdo.php';
        require_once __DIR__ . '/lib/user.php';
        ?>
    </header>

    <!----------------------------------------------------- MAIN ----------------------------------------------------->

    <main class="shadow w-75 mx-auto bg-light bg-opacity-50">
        <h1 class="pt-5 d-flex justify-content-center">Insription</h1>

        <!--------------------------------------- FORMULAIRE D'INSCRIPTION --------------------------------------->
        
        <form action="registerPost.php" method="POST" class="w-50 mx-auto py-5">
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" name="name" rows="3" required class="form-control"> <br>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Prénom :</label>
                <input type="text" name="surname" rows="3" required class="form-control"> <br>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email :</label>
                <input type="email" name="email" class="form-control" rows="3" required> <br>
            </div>

            <div class="mb-3">
                <label for="tel_num_users" class="form-label">Numéro de téléphone :</label>
                <input type="tel" name="tel_num_users" class="form-control" rows="3" required> <br>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" class="form-control" rows="3" required> <br>
            </div>
            <input class="btn btn-success" type="submit" value="S'inscrire">

        </form>
    </main>

    <!---------------------------------------------------- FOOTER ---------------------------------------------------->

    <footer class='bg-white'>
        <?php include_once __DIR__."/templates/footer.php"?>
    </footer>

</body>

</html>