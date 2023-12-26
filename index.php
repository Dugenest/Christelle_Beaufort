<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/styleIndex.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Christelle Beaufort</title>
</head>

<body>

    <?php require_once(__DIR__ . '/header.php'); ?>

        <h1 class="d-none">Présentation Christelle Beaufort</h1>
        <section class="container-fluid logo">
            <div class="row justify-content-center">
                <img src="./public/assets/img/Christelle-Beaufort-rev-2.png" alt="logo" id="imgLogo">
            </div>
        </section>
<!-- Fin du header -->

<!-- Début du main -->
    <main>
        <section class="container-fluid biographie">
            <div class="row text-center">
                <div class="col-12 col-lg-4 imgProfil">
                    <img src="./public/assets/img/Cours-photo-en-ligne-PALLE-1710260001-scaled.jpeg" alt="photo profil" class="image-fluid" id="photoProfil">
                </div>
                <div class="col-12 col-lg-8">
                    <h2>BIOGRAPHIE</h2>
                    <p class="px-5">Bienvenue dans mon univers photographique,
                        Je suis une jeune Maman qui pratique la photographie depuis plus de 10 ans. Cette passion est devenue virale depuis le décès de mon papa. En effet je faisais malheureusement partie de ceux qui ont oublié que la vie pouvait s’arrêter un jour et qu’à se moment, les seuls souvenirs qu’il nous reste sont principalement les photographies … Depuis je voudrais offrir la possibilité à tous de graver les moments de bonheur et des les garder précieusement.
                        Grâce aux nombreuses personnes qui ont cru en moi, j’ai développé durant toutes ces années, de manière autodidacte, mes compétences lors des évènements importants d’une vie (mariages, séances grossesse…etc).
                        Je suis aujourd’hui professionnelle et prête à immortaliser vos moments d’amour à transmettre de génération en génération.
                        En parallèle, j’ai aussi développé mes compétences pour la photographie animalière et de paysage grâce à plusieurs voyages effectués au coté de grand professionnels de la photographie. (Tony Crocetta, Eric LeGo). Grâce à ces voyages, je peux également vous transmettre les plus belles choses que j’ai vu et immortalisé. Nous sommes loin d’imaginer ce que la nature peut nous offrir tant que nous ne l’avons pas vu de nos yeux … laissez moi vous faire voyager l’espace de quelques clichés.vg
                    </p>
                </div>
            </div>
        </section>

        <section class="container-fluid portfolio py-5">
            <div class="row">
                <h2>PORTFOLIO</h2>
                <div class="col carousel slide" id="carouselExampleIndicators"  data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./public/assets/img/Animaux de compagnie/_DSC0618-2.jpg" class="d-block" alt="Tête de cheval">
                        </div>
                        <div class="carousel-item">
                            <img src="./public/assets/img/Mariage/DSC_6643.jpg" class="d-block" alt="Mariés main dans la main">
                        </div>
                        <div class="carousel-item">
                            <img src="./public/assets/img/Portrait de famille/DSC_5235.jpg" class="d-block" alt="Homme embrassant sa femme enceinte">
                        </div>
                        <div class="carousel-item">
                            <img src="./public/assets/img/Love Yourself/DSC_6390-2.jpg" class="d-block" alt="Homme posant seul">
                        </div>
                        <div class="carousel-item">
                            <img src="./public/assets/img/Portrait de famille/DSC_2649-2.jpg" class="d-block" alt="Bébé allongé">
                        </div>
                    </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
            </div>
        </section>
    </main>

    <?php require_once(__DIR__ . '/footer.php'); ?>
