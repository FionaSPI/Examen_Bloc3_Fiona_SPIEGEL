<!DOCTYPE html>
<html lang="fr>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Billetterie -JO Paris 2024</title>
</head>


<body>

    <!---------------------------------------------------- HEADER ---------------------------------------------------->

    <header class="bg-white">
        <?php
        require_once __DIR__. '/templates/header.php';
        require_once 'lib/offers.php';
        require_once "lib/pdo.php";
        require_once 'lib/user.php';

        $offers = getOffers($pdo);

        $offer = [
            'id_offer' =>'',
            'offer_name' => '',
            'tickets_num' => ''
        ]?>

        <img src="assets/images/headertickets.jpg" class="w-100" alt="">

    </header>

    <!----------------------------------------------------- MAIN ----------------------------------------------------->

    <main class="mx-auto w-75 bg-white bg-opacity-75 p-5">
        <h1 class="text-center mb-5">Billetterie -JO Paris 2024</h1>

        <div class="w-75 mx-auto bg-white py-5">

            <!------------------------------------------ SELECTION OFFRE ------------------------------------------>

            <form action="cart.php" method="post">

                <div class="mb-3 text-center">
                    <label for="id_offer" class="form-label h2 mb-5">Sélectionnez une offre</label>
                    <select name="choice" id="id_offer" class="form-select mx-auto" style="width:250px">

                        <?php foreach ($offers as $offer) { ?>
                        <option value="<?=$offer['id_offer'] ?>"><?=$offer['offer_name'] ?> :
                            <?=$offer['tickets_num'] ?> entrée(s) </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success" type="submit" name="add" >Ajouter au panier</button>
                </div>

            </form>


        </div>
    </main>

    <!---------------------------------------------------- FOOTER ---------------------------------------------------->

    <footer class='bg-white'>
        <?php include_once __DIR__."/templates/footer.php"?>
    </footer>

</body>

</html>