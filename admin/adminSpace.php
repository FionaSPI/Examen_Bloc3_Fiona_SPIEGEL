<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Aministrateur</title>
</head>

<body>


    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-3">

        <?php
            require_once __DIR__. '/headerAdmin.php';
            require_once __DIR__. '/../lib/offers.php';
            require_once __DIR__. "/../lib/pdo.php";
            require_once __DIR__. '/admin.php';
            require_once __DIR__. '/offresAdmin.php';


        if (!isAdminConnected()) {
            header('Location: loginAdmin.php');
        }


        $errorsOffer = [];
        $messagesOffer = [];


        $offers = getOffres($pdo);
        
        $offer = [
            'id_offer'=>'',
            'offer_name' => '',
            'tickets_num' => ''
        ];

        // Le formulaire d'ajout/modif de l'offre a été envoyé
        if (isset($_POST['saveOffer'])) {
            if (!empty($_POST['offer_name'])) {
                $offerId = null;
                if (isset($_GET['id_offer'])) {
                    $offerId = $_GET['id_offer'];
                }
                $res = saveOffer($pdo, (int) $offerId, $_POST['offer_name'], $_POST['tickets_num']);
                if ($res) {
                    if ($offerId) {
                        $messagesOffer[] = "L'offre a bien été mise à jour";
                    } else {
                        header('Location: adminSpace.php');
                        $messagesOffer[] = "L'offre a bien été enregistrée";
                        } 
                } else {
                    // erreur
                    $errorsOffer[] = "L'offre n'a pas été enregistrée";
                }
        }}


        if (isset($_POST['updateOffer'])) {
            if (!empty($_POST['offer_name'])) {
                // sauvegarder
                $id_offer = (isset($_POST['id_offer']) ? $_POST['id_offer'] : null);
                $res = updateOffer($pdo, $_POST['offer_name'], (int)$_POST['id_offer'], false, $id_offer);
            } else {
                // erreur
                $errorsOffer[] = "Le nom de l'offre est obligatoire";
            }
        }

        $editMode = false;
        if (isset($_GET['id_offer'])) {
            $offerId = getOfferById($pdo, (int)$_GET['id_offer']);
            $editMode = true;

            $offers = getOffres($pdo);

        }

?>


    </header>


    <main class="mx-auto w-75 bg-white bg-opacity-75 p-5 text-center">
        <h1 class="mb-5">Page Administrateur</h1>

        <h2>Offres enregistrées</h2>
        <div class="container col-xxl-8 my-5">

            <?php foreach ($errorsOffer as $error) { ?>
            <div class="alert alert-danger">
                <?=$error; ?>
            </div>
            <?php } ?>

            <?php foreach ($messagesOffer as $message) { ?>
            <div class="alert alert-success">
                <?= $message; ?>
            </div>
            <?php } ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id de l'offre</th>
                        <th scope="col">Nom de l'offre</th>
                        <th scope="col">Nombre de tickets</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($offers as $offer) {?>
                    <tr>
                        <td><?= $offer['id_offer'] ?></td>
                        <td><?= $offer['offer_name'] ?></td>
                        <td><?= $offer['tickets_num'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>




            <div class="accordion" id="accordionExample">
                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button <?= ($editMode) ? 'collapsed' : '' ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                            aria-expanded="<?= ($editMode) ? 'false' : 'true' ?>" aria-controls="collapseOne">
                            <?= ($editMode) ? $offer['offer_name'] : 'Ajouter une offre' ?>
                        </button>
                    </h2>


                    <div id="collapseOne" class="accordion-collapse collapse   <?= ($editMode) ? '' : 'show' ?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="" method="post">

                                <div class="mb-3">
                                    <label for="offer_name" class="form-label">Intitulé de l'offre</label>
                                    <input type="text" name="offer_name" id="offer_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="tickets_num" class="form-label">Nombre(s) d'entrée(s)</label>
                                    <input type="text" name="tickets_num" id="tickets_num" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Enregistrer" name="saveOffer" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion my-3" id="accordionExample">
                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button <?= ($editMode) ? 'collapsed' : '' ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                            aria-expanded="<?= ($editMode) ? 'false' : 'true' ?>" aria-controls="collapseOne">
                            <?= ($editMode) ? $offer['offer_name'] : 'Modifier une offre' ?>
                        </button>
                    </h2>


                    <div id="collapseOne" class="accordion-collapse collapse   <?= ($editMode) ? '' : 'show' ?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="" method="post">

                                <div class="mb-3">
                                    <label for="offer_name" class="form-label">Intitulé de l'offre</label>
                                    <input type="text" name="offer_name" id="offer_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="tickets_num" class="form-label">Nombre(s) d'entrée(s)</label>
                                    <input type="text" name="tickets_num" id="tickets_num" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Modifier" name="updateOffer" class="btn btn-warning">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                <label for="selectOffer" class="form-label mb-5">Sélectionner l'offre à supprimer</label>
                <select name="selectOffer0" class="form-select mx-auto" id="selectOffer">
                    <?php foreach ($offers as $offer) { ?>
                    <option value="<?=$offer['id_offer'] ?>"><?=$offer['offer_name'] ?> :
                        <?=$offer['tickets_num'] ?> entrée(s) </option>
                    <?php } ?>
                </select>

                <div class="my-3">
                    <input type="submit" value="Supprimer" name="deleteOffer" class="btn btn-danger">
                </div>

            </form>
        </div>

    </main>

    <footer class='bg-white'>
        <?php include_once __DIR__. "/../templates/footer.php"?>
    </footer>

</body>

</html>