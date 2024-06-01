<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Accueil -JO Paris 2024</title>
</head>


<body>

    <!---------------------------------------------------- HEADER ---------------------------------------------------->
    <header class="bg-white">
        <?php
        require_once __DIR__. '/templates/header.php';
        ?>
        <!----------------------------------------------- CAROUSSEL ----------------------------------------------->
        <div class="bg-black" id="carouselSize">
            <div id="carouselExampleIndicators" class="carousel slide mx-auto">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/image1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/image2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/image3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/image4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/image5.jpg" class="d-block w-100" style="margin-top:-15rem" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </header>


    <!----------------------------------------------------- MAIN ----------------------------------------------------->

    <main>

        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">

                <div class="card my-3 mx-auto bg-light border border-4 border-info shadow">
                    <img src="assets/images/natation.jpg" class="card-img-top" alt="Course de natation vue du dessus.">

                    <div class="card-body">
                        <h5 class="card-title">Natation</h5>
                        <p class="card-text">Aux Jeux Olympiques, les épreuves de natation se déroulent dans un
                            bassin
                            de 50m de long. Il existe quatre types de nage en natation, qui sont courues soit en
                            épreuves individuelles, soit en relais : la brasse, le papillon, le dos et la nage libre,
                            toujours exécutée avec la technique du crawl. Un cinquième type de course, la course de
                            quatre nages, regroupe les quatre précédentes et voit les nageurs enchaîner les quatre types
                            de nages. Les distances varient également, et ne demandent pas les mêmes qualités pour une
                            course de 50m que pour un 1500m. L’explosivité tout comme l’endurance, la puissance et la
                            technique sont des qualités indispensables pour les nageurs.</p>
                        <p class="card-text"><small
                                class="text-body-secondary">https://olympics.com/fr/paris-2024/sports/natation</small>
                        </p>
                    </div>
                </div>

                <hr class="w-50 mx-auto">

                <div class="card my-3 mx-auto bg-light border border-4 border-danger shadow">
                    <img src="assets/images/athletisme.jpg" class="cart-image-top"
                        alt="Coureurs alignés sur la ligne de départ, prêts à partir.">
                    <div class="card-body">
                        <h5 class="card-title my-3">Athlétisme</h5>
                        <p class="card-text">Aujourd’hui encore l’athlétisme comporte une grande variété d’épreuves.
                            Du
                            fait de ces nombreuses catégories et disciplines, l’athlétisme est le sport individuel
                            qui
                            comporte le plus de participants aux Jeux Olympiques.
                            <br>
                            Le programme sur piste contient des épreuves masculines et féminines de sprint, de
                            demi-fond
                            et de fond, ainsi que des courses de haies, de steeple et des relais. Ces épreuves se
                            déroulent toutes sur la piste du stade olympique, qui est d’une longueur de 400 mètres
                            et
                            est composée de deux lignes droites et de deux demi-cercles.
                        </p>
                        <p class="card-text"><small
                                class="text-body-secondary">https://olympics.com/fr/paris-2024/sports/athletisme</small>
                        </p>

                    </div>
                </div>


                <hr class="w-50 mx-auto">


                <div class="card my-3 mx-auto bg-light border border-4 border-success shadow">
                    <img src="assets/images/tennis.jpg" class="card-img-top" alt="Une femme joue au tennis.">

                    <div class="card-body">
                        <h5 class="card-title my-3">Tennis</h5>
                        <p class="card-text">Aux Jeux Olympiques, le tennis dispose d’épreuves masculines et
                            féminines
                            de simple et de double, ainsi que d’une épreuve de double mixte. Les épreuves
                            individuelles
                            hommes et femmes se jouent au meilleur des trois sets.  Le tie-break est instauré dans
                            la
                            manche décisive pour chaque discipline, à l’exception du double mixte où, en cas
                            d’égalité à
                            un set partout, un super tie-break est joué pour départager les joueurs.</p>
                        <p class="card-text"><small
                                class="text-body-secondary">https://olympics.com/fr/paris-2024/sports/tennis</small>
                        </p>
                    </div>
                </div>

                <hr class="w-50 mx-auto">

                <div class="card my-3 mx-auto bg-light border border-4 border-warning shadow">

                    <img src="assets/images/judo.jpg" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title my-3">Judo</h5>
                        <p class="card-text">L’objectif est de projeter son adversaire au sol, de l’immobiliser ou
                            de
                            l’obliger à abandonner en utilisant des clés articulaires et des étranglements. Il
                            existe
                            deux principaux types d’avantages dans le judo moderne. Le Ippon consiste en un impact
                            significatif sur le dos avec force, vitesse et contrôle, ou un abandon (causé par un
                            étranglement ou une clef de bras), ou encore une immobilisation au sol de 20 secondes.
                            Le
                            Ippon donne immédiatement la victoire à celui qui l’inflige à son adversaire. Le
                            waza-ari,
                            lui, fait suite à un impact pour lequel il manque l’un des trois critères du Ippon, ou
                            une
                            immobilisation inférieure à 20 secondes (mais supérieure à dix secondes). Deux waza-ari
                            équivalent à un Ippon et donnent la victoire à celui qui les exécute.<br>
                        </p>
                        <p class="card-text"><small
                                class="text-body-secondary">https://olympics.com/fr/paris-2024/sports/judo</small>
                        </p>
                    </div>
                </div>



                <hr class="w-50 mx-auto">


                <div class="card my-3 mx-auto bg-light border border-4 border-black shadow">
                    <img src="assets/images/escrime.jpg" class="card-img-top" alt="Une femme joue au tennis.">
                    <div class="card-body">
                        <h5 class="card-title my-3 text-center">Escrime</h5>
                        <p class="card-text">En escrime, deux concurrents se font face, une arme à la main, et
                            doivent
                            toucher leur adversaire de leur arme sur une zone donnée. Chaque arme dispose de ses
                            spécificités. Le sabre permet de toucher son adversaire avec toutes les parties de la
                            lame
                            (pointe, tranchant et dos). La surface valable comprend le haut du corps à partir de la
                            taille, incluant les bras et la tête. L’épée et le fleuret ne permettent de marquer des
                            points qu’avec la pointe, mais sur l’ensemble du corps (incluant le masque et les
                            chaussures) pour l’épée, et uniquement sur le tronc (buste, épaules et cou) pour le
                            fleuret.
                            L’escrimeur qui atteint quinze points, ou qui en a le plus à la fin du temps
                            réglementaire
                            remporte le combat. Par équipe, c’est la première équipe à 45 points, ou qui en a le
                            plus à
                            la fin du temps réglementaire, qui l’emporte.</p>
                        <p class="card-text"><small
                                class="text-body-secondary">https://olympics.com/fr/paris-2024/sports/escrime</small>
                        </p>
                    </div>
                </div>
            </div>


    </main>

    <!---------------------------------------------------- FOOTER ---------------------------------------------------->

    <footer class='bg-white'>
        <?php include_once __DIR__."/templates/footer.php"?>
    </footer>
</body>

</html>