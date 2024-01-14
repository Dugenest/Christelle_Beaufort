    <?php require_once(__DIR__ . '/views/templates/Home/head.php'); ?>

    <link rel="stylesheet" href="./public/assets/css/styleTarif.css">
    <title>Christelle Beaufort</title>
</head>

<body>

    <?php require_once(__DIR__ . '/views/templates/Home/header.php'); ?>

    <h1>TARIF PRESTATIONS</h1>
    <section class="container-fluid logo">
        <div class="row justify-content-center">
            <img src="./public/assets/img/Christelle-Beaufort-rev-2.png" alt="logo" id="imgLogo">
        </div>
    </section>
<!-- Fin du header -->

<!-- Début du main -->
<main>
    <div class="container-fluid py-md-5">
        <div class="row py-5">
            <h2 class="titleH2 py-5">TARIFS PRESTATIONS MARIAGE</h2>
            <div class="col-12 col-md-3 py-md-5 card" >
                <h3>∞  Engagement  ∞</h3><hr>
                <div class="card-body">
                    <h5 class="card-title"><U>Cette option comprend :</U></h5>
                    <ul class="card-text">
                        <li>8 heures de présence continue entre 10h et 21h (à définir avec vous)</li>
                        <li>1 clé USB contenant toutes les photos travaillées</li>
                        <li>Galerie photo en ligne</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <p>- 1090€ -</p>
                </div>
            </div>

            <div class="col-12 col-md-3 py-md-5 card" >
                <h3>∞  Passion  ∞</h3><hr>
                <div class="card-body">
                    <h5 class="card-title"><U>Cette option comprend :</U></h5>
                    <ul class="card-text">
                        <li>12 heures de présence continue entre 10h et 21h (à définir avec vous)</li>
                        <li>1 clé USB contenant toutes les photos travaillées</li>
                        <li>Galerie photo en ligne</li>
                        <li>1 livre photo 30x20</li>
                    </ul>
                    <div class="card-text-end text-center">
                        <p> + </p>
                        <p>1 Tirage de la photo de votre choix</p>
                        <p>sur papier de qualité en 30x45</p>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p>- 1490€ -</p>
                </div>
            </div>

            <div class="col-12 col-md-3 py-md-5 card" >
                <h3>∞  Inconditionnel  ∞</h3><hr>
                <div class="card-body">
                    <h5 class="card-title"><U>Cette option comprend :</U></h5>
                    <ul class="card-text">
                        <li>16 heures de présence continue (à définir avec vous)</li>
                        <li>1 clé USB contenant toutes les photos travaillées</li>
                        <li>Galerie photo en ligne</li>
                        <li>1 livre photo 30x30</li>
                    </ul>
                    <div class="card-text-end text-center">
                        <p> + </p>
                        <p>Coffret de rangement du livre photo</p>
                        <p>OFFERT</p>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p>- 1950€ -</p>
                </div>
        </div>
            
            <div class="row text-center justify-content-center py-3">
                <a button type="button" id="btnGalerie" href="./contact.php" class="btn btn-light">CONTACT</button></a>
            </div>
    </div>
</main>
<!-- fin du main -->
                
<?php require_once(__DIR__ . '/views/templates/Home/footer.php'); ?>