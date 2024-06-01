<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Votre panier</title>
</head>


<body>

    <!---------------------------------------------------- HEADER ---------------------------------------------------->
    <header class="bg-white">
        <?php
        include_once __DIR__. '/templates/header.php';
        require_once 'lib/offers.php';
        require_once "lib/pdo.php";
        require_once "lib/user.php";
        ?>
    </header>

    <!----------------------------------------------------- MAIN ----------------------------------------------------->

    <main class="mx-auto py-5 w-75 bg-white shadow">

        <!------------------------------------------- CONTENU DU PANIER ------------------------------------------->

        <h1 class="text-center mb-5">Voici votre panier</h1>

        <hr class="w-75 mx-auto">

        <form action="downloadTicket.php" method="post">

            <?php 
            $choiceForm = $_POST['choice'];
            $query = "SELECT * FROM offres WHERE `id_offer` = :choice";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':choice', $choiceForm);

            if ($stmt->execute()) {
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {?>

            <div class="w-75 mx-auto d-flex justify-content-between align-items-center">
                <div class="row text-center align-items-center">
                    <img class="col-md-4" src="assets/images/tickets.png" style="width:300px" alt="Illustration numérique, 
                        de 2 tickets, avec le logo des JO Paris 2024 et un faux QR Code, 
                        qui se chevauchent, celui du dessus est noir et celui du-dessous est jaune.">

                    <div class="col-md-4 display-5">1 offre <?php echo $result['offer_name']?> </div>
                    <label class="col-md-3" for='tickets' style="font-size : 1.5rem">Nombre(s) de ticket(s) :</label>
                    <input type="number" name="tickets" id="tickets" style="font-size : 1.5rem" type="number" readonly
                        class="col-md-1 text-center" value="<?php echo $result['tickets_num']?>"></input>
                </div>
            </div>


            <hr class="w-75 mx-auto">

            <!--------------------------------------- MOYENS DE PAIEMENT --------------------------------------->

            <h2 class="text-center mb-5">Moyens de paiement</h1>

                <div class="w-50 mx-auto" style="font-size : 1.5rem">
                    <div class="form-check mx-auto my-3" style="width : 200px">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="carteBleue" checked>
                        <label class="form-check-label" for="carteBleue">
                            Carte Bleue
                        </label>
                    </div>

                    <div class="form-check mx-auto my-3" style="width : 200px">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="paypal">
                        <label class="form-check-label" for="paypal">
                            PayPal
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success" type="submit" name="pay" value="Payer">Payer</button>
                </div>
                <?php }}?>
        </form>

    </main>

    <!---------------------------------------------------- FOOTER ---------------------------------------------------->

    <footer class='bg-white'>
        <?php include_once __DIR__."/templates/footer.php"?>
    </footer>

</body>