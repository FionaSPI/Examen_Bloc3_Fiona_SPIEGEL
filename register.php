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

        $errors = [];

        if (isset($_POST['registerUser'])) {
            $nameForm = $_POST['name'];
            $surnameForm = $_POST['surname'];
            $emailForm = $_POST['email'];
            $telForm = $_POST['tel_num_users'];
            $passwordForm = $_POST['password'];

            //Vérifier l’unicité de l’adresse mail
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $emailForm);
            $stmt->execute();

            //Vérifier que l'email de l’utilisateur existe
            if($stmt->rowCount() > 0){
                $errors[] ="Cette adresse email est déjà utilisée.";
            }

            // Hashage(encryptage)
            $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

            //Insérer les données dans la base 
            $insertQuery = "INSERT INTO users ( name, surname, email, tel_user, password) VALUES (:name, :surname, :email, :tel_num_users, :password)";
            $stamt = $pdo->prepare($insertQuery);
            $stamt->bindParam(':name', $nameForm);
            $stamt->bindParam(':surname', $surnameForm);
            $stamt->bindParam(':email', $emailForm);
            $stamt->bindParam(':tel_num_users', $telForm);
            $stamt->bindParam(':password', $hashedPassword);
            $stamt->execute();
            if($stamt->rowCount() > 0){
                $errors[] ="Cette adresse email est déjà utilisée.";
            }
            
            $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
            
        

            if ($user) {
                // on va le connecter => session
                $_SESSION['users'] = $user;
                header("Location: tickets.php");
            } else {
                   // afficher une erreur
                $errors[] = "Email ou mot de passe incorrect";
            }}
        
        
        
        
        
        
        ?>


    </header>

    <!----------------------------------------------------- MAIN ----------------------------------------------------->

    <main class="shadow row mx-auto bg-light bg-opacity-50">
        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="row">
                <h1 class="pt-5 d-flex justify-content-center">Insription</h1>

                <!--------------------------------------- FORMULAIRE D'INSCRIPTION --------------------------------------->
                
                 <?php
                foreach ($errors as $error) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$error; ?>
                </div>
                <?php }
                ?>

                <form action="" method="POST" class="col-sm-10 col-md-8 col-lg-8 mx-auto py-5">
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
                    <input class="btn btn-success" type="submit" name='registerUser' value="S'inscrire">

                </form>
            </div>
        </div>
    </main>

    <!---------------------------------------------------- FOOTER ---------------------------------------------------->

    <footer class='bg-white'>
        <?php include_once __DIR__."/templates/footer.php"?>
    </footer>

</body>

</html>